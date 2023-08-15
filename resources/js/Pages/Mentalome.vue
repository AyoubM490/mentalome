<script setup>

import MultiSelect from "@/Components/MultiSelect.vue";
import {onMounted, onUpdated, ref, toRaw} from "vue";
import SingleSelect from "@/Components/SingleSelect.vue";
import MentalomeLayout from "@/Layouts/MentalomeLayout.vue";
import {router} from "@inertiajs/vue3";
import Abbreviation from "@/Components/Abbreviation.vue";

const props = defineProps({
  selected_gene_ids: {
    type: Array,
    required: true
  },
  diseases: {
    type: Array,
    required: true
  },
  experiments: {
    type: Array,
    required: true
  },
  sras: {
    type: Array,
    required: true
  },
  abbreviations: {
    type: Array,
    required: true
  },
  values: {
    type: Array,
    required: true
  },
  gene_ids_search: {
    type: Array,
    required: true
  },
  gene_ids: {
    type: Array,
    required: true
  }
})

let geneIds = props.gene_ids
let selectedGeneIds = props.selected_gene_ids
let diseases = props.diseases
let experiments = props.experiments
let sras = props.sras
let abbreviations = props.abbreviations

let formData = ref({})

const getSelectedGeneIds = (selectedGeneIds) => {
  formData['gene_ids'] = JSON.stringify(selectedGeneIds)
  return selectedGeneIds
}

const getDiseases = (diseases) => {
  formData['disease'] = diseases
  return diseases
}

const getExperiments = (experiments) => {
  formData['experiment'] = experiments
  return experiments
}

const getSRAs = (sras) => {
  formData['SRA'] = sras
  return sras
}

const send = async () => {
  const base_url = 'http://127.0.0.1:8000'
  router.visit(`${base_url}/api`, {
    method: 'post',
    data: formData,
    replace: false,
    preserveState: true,
    preserveScroll: true,
    only: [],
    headers: {},
    errorBag: null,
    forceFormData: false,
    onCancelToken: cancelToken => {
    },
    onCancel: () => {
    },
    onBefore: visit => {
    },
    onStart: visit => {
    },
    onProgress: progress => {
    },
    onSuccess: page => {
      console.log("success post")
    },
    onError: errors => {
    },
    onFinish: visit => {
    },
  })
}


google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

function drawChart() {
  // A DataTable is required, but it can be empty.
  const dataTable = new google.visualization.DataTable();

  const options = {
    'vega': {
      $schema: "https://vega.github.io/schema/vega/v5.json",
      description: "Heatmap Example",
      width: 1100,
      height: 500,
      padding: 0,
      data: [{
        name: "heatmapData",
        values: toRaw(props.values)
      }],
      scales: [{
        name: "xScale",
        type: "band",
        range: "width",
        domain: {
          data: "heatmapData",
          field: "SRA"
        }
      }, {
        name: "yScale",
        type: "band",
        range: "height",
        domain: {
          data: "heatmapData",
          field: "gene_ids"
        }
      }, {
        name: "colorScale",
        type: "sequential",
        range: {
          scheme: "Viridis"
        },
        domain: {
          data: "heatmapData",
          field: "value"
        }
      }],
      axes: [{
        orient: "bottom",
        scale: "xScale",
        title: "SRA",
        encode: {
          labels: {
            update: {
              angle: {
                value: -60
              },
              align: {
                value: "right"
              },
              baseline: {
                value: "middle"
              },
              dx: {
                value: -5
              },
              dy: {
                value: 5
              }
            }
          }
        }
      }, {
        orient: "left",
        scale: "yScale",
        title: "Gene id"
      }],
      legends: [{
        orient: "right",
        fill: "colorScale",
        title: "Value",
        type: "gradient",
        gradientLength: {
          signal: "height - 16"
        }
      }],
      marks: [{
        type: "rect",
        from: {
          data: "heatmapData"
        },
        encode: {
          enter: {
            x: {
              scale: "xScale",
              field: "SRA"
            },
            y: {
              scale: "yScale",
              field: "gene_ids"
            },
            width: {
              scale: "xScale",
              band: 1
            },
            height: {
              scale: "yScale",
              band: 1
            },
            fill: {
              scale: "colorScale",
              field: "value"
            },
            tooltip: {
              signal: "{'SRA': datum.SRA, 'Gene Id': datum.gene_ids, 'Value': datum.value}"
            },
            stroke: {
              value: "#fff"
            },
            strokeWidth: {
              value: .5
            }
          },
          update: {
            fillOpacity: {
              value: 1
            }
          },
          hover: {
            fillOpacity: {
              value: .7
            }
          }
        },
        events: {
          hover: {
            update: "datum"
          }
        }
      }]
    }
  };

  const chart = new google.visualization.VegaChart(document.getElementById('chart-div'));
  chart.draw(dataTable, options);
}


</script>

<template>

  <MentalomeLayout title="Mentalome">
    <multi-select :selectedGeneIds="selectedGeneIds" :geneIds="geneIds" @getSelectedGeneIds="getSelectedGeneIds"
                  title="Select gene ids"
                  class="mb-5"></multi-select>
    <div class="w-full flex mb-8">
      <single-select title="Select Disease:" :tags="diseases" @getTag="getDiseases"/>
      <single-select title="Select Experiment:" :tags="experiments" @getTag="getExperiments"/>
      <single-select title="Select SRA:" :tags="sras" @getTag="getSRAs"/>
    </div>
    <div class="mb-6 flex py-3.5">
      <button @click.prevent="send" type="submit"
              class="mx-auto w-52 style-button text-white rounded py-2 px-4 hover:bg-white hover:text-blue-700 hover:border border-blue-700 font-bold"
      >
        Select
      </button>
    </div>
  </MentalomeLayout>

  <MentalomeLayout title="Heatmap">
    <div class="mx-grouping flex">
      <div class="h-3 w-full mx-auto" :class="{'ct': abbreviation['Abbreviation'] === 'CT', 'pt': abbreviation['Abbreviation'] === 'PT'}" v-for="abbreviation in props.abbreviations" :key="abbreviation"></div>
    </div>
    <div id="chart-div" class="ml-24" style="max-width: 100vw; height: 611px;"></div>
    <hr class="mx-8"/>
    <h2 class="mt-8 px-8 font-bold text-xl">Abbreviation:</h2>
    <abbreviation v-for="abbreviation in props.abbreviations" :key="abbreviation"
                  :abbreviation="abbreviation['Abbreviation']"/>
  </MentalomeLayout>
</template>

<style scoped>

.mx-grouping {
  margin-right: 11rem;
  margin-left: 10.4rem;
}

.ct {
  background-color: rgb(86, 189, 137);
}

.pt {
  background-color: rgb(110, 133, 183);
}

.h2 {
  font-size: 2rem;
  color: #6E85B7;
}

.style-button {
  background-color: #6E85B7;
  color: white;
}

</style>
