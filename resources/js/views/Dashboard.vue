<template>
  <div class="mt-20 px-4">
    <div class="grid grid-cols-2 gap-4">
      <div class="border shadow-lg rounded">
        <div class="p-4 border-b text-center bg-indigo-700 text-white font-bold font-lg">
          Users
        </div>
        <div class="bg-indigo-50 p-4">
          <Bar :data="bar.data" :options="bar.options" :style="chartStyles" />
        </div>
      </div>
      <div class="border shadow-lg rounded">
        <div class="p-4 border-b text-center bg-indigo-700 text-white font-bold font-lg">
          Orders
        </div>
        <div class="bg-indigo-50 p-4">
          <Pie :data="pie.data" :options="pie.options" :style="chartStyles" />
        </div>
      </div>
    </div>
  </div>
</template>
<script lang="ts">
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
  ArcElement,
} from "chart.js";
import { Bar } from "vue-chartjs";
import { Pie } from 'vue-chartjs'

ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
  ArcElement
);

export default {
  data() {
    return {
      bar: {
        data: {
          labels: ["January", "February", "March"],
          datasets: [{ data: [40, 20, 12] }],
        },
        options: {
          responsive: true,
        },
      },

      pie: {
        data: {
          labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
          datasets: [
            {
              backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
              data: [40, 20, 80, 10]
            }
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      }



    };
  },
  components: {
    Bar,
    Pie
  },

  props: {},

  computed: {
    chartStyles() {
      return {
        height: `${500}px`,
        position: "relative",
      };
    },
  },

  methods: {},

  watch: {
    $data: {
      handler: function (val, oldVal) {
        console.log("watcher: ", val);
      },
      deep: true,
    },

    $props: {
      handler: function (val, oldVal) {
        console.log("watcher: ", val);
      },
      deep: true,
    },
    some_prop: function () {
      //do something if some_prop updated
    },
  },

  updated() {},

  beforeMounted() {},

  mounted() {},
};
</script>

<style scoped>
</style>
