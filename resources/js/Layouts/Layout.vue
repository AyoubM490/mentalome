<script setup>
import Nav from "@/Components/Nav.vue"
import WaveSvg from "@/Components/WaveSvg.vue";
</script>

<template>
  <Head>
    <title>Heatmap</title>
    <meta type="description" content="Information about my app" head-key="description"/>
  </Head>
  <div class="navbar">
    <section class="navbar p-5 mx-auto w-10/12">
      <header class="flex justify-between items-center">
        <div class="flex items-center">
          <Link href="/"><img src="https://bioinformatics.um6p.ma/Mentalome/assets/Heatmap.bae7c276.svg"
                              width="150"/></Link>
        </div>
        <Nav/>
      </header>
    </section>
  </div>
  <div class="header">
    <div class="title pt-3">
      <h1 class="text-white font-bold h2 text-center w-10/12 mx-auto">Mentalome: Unveiling the Complex Landscape
        of Psychiatric Disorders through Comprehensive Transcriptome Analysis</h1>
    </div>
    <div class="header">
      <wave-svg/>
    </div>

  </div>


  <section class="p-6 bg-gray-100">
    <div class="mx-auto">
      <slot/>
    </div>
  </section>

  <svg class="rotate-180 border-transparent w-full !border-none !top-4 z-idx" xmlns="http://www.w3.org/2000/svg"
       xmlns:xlink="http://www.w3.org/1999/xlink"
       style="margin:auto;background:#f1f2f3;display:block;z-index:1;position:relative" width="2250" height="63"
       preserveAspectRatio="xMidYMid" viewBox="0 0 2250 63">
    <g transform="translate(1125,31.5) scale(1,1) translate(-1125,-31.5)">
      <linearGradient id="lg-0.5603437270027358" x1="0" x2="1" y1="0" y2="0">
        <stop stop-color="#111827" offset="0"></stop>
        <stop stop-color="#1f3055" offset="1"></stop>
      </linearGradient>
      <path d="" fill="url(#lg-0.5603437270027358)" opacity="0.4">
        <animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1" calcMode="spline"
                 keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="0s"
                 values="M0 0L 0 54.15960108671365Q 225 74.09730657142961  450 54.69588857325856T 900 42.342705415511205T 1350 37.089900221434284T 1800 37.46613917755743T 2250 32.19963698688829L 2250 0 Z;M0 0L 0 60.35699192320976Q 225 68.87698894033903  450 49.09437774385713T 900 40.981212842240566T 1350 39.88503985924126T 1800 33.29389682460135T 2250 32.83498929786056L 2250 0 Z;M0 0L 0 52.72876608703023Q 225 81.34774041563841  450 48.0181887221219T 900 44.71348415011056T 1350 32.97331782314021T 1800 28.61011134518937T 2250 23.17630135061235L 2250 0 Z;M0 0L 0 54.15960108671365Q 225 74.09730657142961  450 54.69588857325856T 900 42.342705415511205T 1350 37.089900221434284T 1800 37.46613917755743T 2250 32.19963698688829L 2250 0 Z"></animate>
      </path>
      <path d="" fill="url(#lg-0.5603437270027358)" opacity="0.4">
        <animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1" calcMode="spline"
                 keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="-2s"
                 values="M0 0L 0 56.521090266713Q 225 66.67802032568937  450 49.18284684493718T 900 42.76943819937277T 1350 39.658677479457T 1800 37.52291923049827T 2250 23.575886263745826L 2250 0 Z;M0 0L 0 62.086484102455294Q 225 75.94250405633042  450 51.130182374551445T 900 45.48109672906452T 1350 38.83626829300725T 1800 32.64388593537992T 2250 31.627738675244874L 2250 0 Z;M0 0L 0 56.50520180718076Q 225 84.96032788071733  450 55.47955954186601T 900 42.451480402097864T 1350 38.40198834109293T 1800 30.31037567993377T 2250 22.814125041218176L 2250 0 Z;M0 0L 0 56.521090266713Q 225 66.67802032568937  450 49.18284684493718T 900 42.76943819937277T 1350 39.658677479457T 1800 37.52291923049827T 2250 23.575886263745826L 2250 0 Z"></animate>
      </path>
      <path d="" fill="url(#lg-0.5603437270027358)" opacity="0.4">
        <animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1" calcMode="spline"
                 keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="-4s"
                 values="M0 0L 0 53.75704334561416Q 225 88.13889283409802  450 53.037950865831576T 900 41.0308815983056T 1350 41.36447415567534T 1800 31.899036584836722T 2250 28.855053610909525L 2250 0 Z;M0 0L 0 62.80439800634901Q 225 95.12555560888954  450 56.61804094192766T 900 52.182077001556024T 1350 35.71012524433276T 1800 32.72856941989712T 2250 32.63345894203286L 2250 0 Z;M0 0L 0 50.865768201558964Q 225 76.73209445431972  450 46.400648193835075T 900 44.572410662171905T 1350 41.003880648582054T 1800 36.61624790661911T 2250 19.46325839832582L 2250 0 Z;M0 0L 0 53.75704334561416Q 225 88.13889283409802  450 53.037950865831576T 900 41.0308815983056T 1350 41.36447415567534T 1800 31.899036584836722T 2250 28.855053610909525L 2250 0 Z"></animate>
      </path>
      <path d="" fill="url(#lg-0.5603437270027358)" opacity="0.4">
        <animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1" calcMode="spline"
                 keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="-6s"
                 values="M0 0L 0 61.584346387510756Q 225 68.72592516743441  450 52.772042879681834T 900 47.93530664633373T 1350 38.1529172182477T 1800 34.33352085148368T 2250 31.42997610727733L 2250 0 Z;M0 0L 0 61.2496502139294Q 225 90.21053684545177  450 52.764568092449295T 900 42.49998225523421T 1350 38.86692299292868T 1800 36.392174848434635T 2250 30.345982745448346L 2250 0 Z;M0 0L 0 56.76904399755139Q 225 101.04603262950423  450 53.84564872859548T 900 44.238967140241044T 1350 35.65233071807424T 1800 34.42702164072127T 2250 29.53518021643557L 2250 0 Z;M0 0L 0 61.584346387510756Q 225 68.72592516743441  450 52.772042879681834T 900 47.93530664633373T 1350 38.1529172182477T 1800 34.33352085148368T 2250 31.42997610727733L 2250 0 Z"></animate>
      </path>
      <path d="" fill="url(#lg-0.5603437270027358)" opacity="0.4">
        <animate attributeName="d" dur="10s" repeatCount="indefinite" keyTimes="0;0.333;0.667;1" calcMode="spline"
                 keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" begin="-8s"
                 values="M0 0L 0 57.40883654528334Q 225 93.05978500650079  450 46.531461666143485T 900 45.81953928130118T 1350 34.73352260021885T 1800 26.100542050679852T 2250 28.907749451443237L 2250 0 Z;M0 0L 0 54.1429285683552Q 225 75.01858050034983  450 53.72241613140628T 900 49.20427487915896T 1350 44.64407554805177T 1800 31.50776623324346T 2250 24.213785126914974L 2250 0 Z;M0 0L 0 54.33497622749983Q 225 73.59980554910578  450 49.48848011904192T 900 48.653718037734585T 1350 35.47870193302144T 1800 32.48560547435771T 2250 31.077947472199217L 2250 0 Z;M0 0L 0 57.40883654528334Q 225 93.05978500650079  450 46.531461666143485T 900 45.81953928130118T 1350 34.73352260021885T 1800 26.100542050679852T 2250 28.907749451443237L 2250 0 Z"></animate>
      </path>
    </g>
  </svg>
  <footer class="flex footer-bg p-6 !z-10">
    <div class="flex text-white max-w-sm">
      <Link href="https://bioinformatics.um6p.ma/Mentalome/assets/agc_logo_big.70826d43.png"><img
          src="https://bioinformatics.um6p.ma/Mentalome/assets/agc_logo_big.70826d43.png" class="max-w-full h-36"/>
      </Link>
    </div>
    <div class="flex-auto text-white text-center">
      <Link href="/"><img src="https://bioinformatics.um6p.ma/Mentalome/assets/Heatmap.bae7c276.svg" width="150"
                          class="mx-auto max-w-2xl"/></Link>
      <div class="font-bold text-xl max-w-2xl mx-auto">2023 &copy; Mentalome is freely avaliable for non-commercial use
        with proper citations.
      </div>
      <Link href="bioinformatics.um6p.ma" class="text-blue-200 font-bold text-xl">bioinformatics.um6p.ma</Link>
    </div>
    <div class="flex text-white max-w-sm">
      <Link href="https://bioinformatics.um6p.ma/Mentalome/assets/um6p_logo_big.b3440e5e.png"><img
          src="https://bioinformatics.um6p.ma/Mentalome/assets/um6p_logo_big.b3440e5e.png" class="max-w-full h-36"/>
      </Link>
    </div>
  </footer>
</template>

<script>
export default {}
</script>

<style scoped>
.z-idx {
  z-index: -1 !important;
}

.footer-bg {
  background-color: #2C3A58
}

.navbar, .title, .header {
  background-color: #6E85B7;
}

.body {
  background-color: black;
}

.h2 {
  font-size: 2rem;
  font-weight: 700;
}

.header {
  background: #6E85B7;
  position: relative;
}

</style>
