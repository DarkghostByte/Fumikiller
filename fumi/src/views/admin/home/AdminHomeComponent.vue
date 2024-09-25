<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div class="">
    <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:black;"></i>
    <h1 style="text-align: center; font-family: 'Arial', sans-serif; font-size: 32px; font-weight: bold;">Reportes</h1>

    <!-- v-for="item in 4" :key="item"-->

    <el-carousel type="card" height="200px" class="m-5 border-radius:5 gb-gray  ">
      <el-carousel-item class="h-auto">
        <div style="justify-content:center;" class="flex items-center p-8  shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
          </div>
          <div>
            <span class="block text-gray-500">Venta Sin Facturas</span>
            <span class="block text-2xl font-bold">${{ totalVentasSinFactura }}</span>
            <a :href="url + 'api/ventsinfact/'" target="_blank">
              <span class="material-symbols-outlined">picture_as_pdf</span>
            </a>
          </div>
        </div>
      </el-carousel-item>
      <el-carousel-item class=" h-auto">
        <div style="justify-content:center;" class="flex items-center p-8 shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
            </svg>
          </div>
          <div>
            <span class="block text-gray-500">Venta Por Facturas</span>
            <span class="block text-2xl font-bold">${{ totalVentasConFactura }}</span>
            <a :href="url + 'api/ventconfact/'" target="_blank">
              <span class="material-symbols-outlined">picture_as_pdf</span>
            </a>
          </div>
        </div>
      </el-carousel-item>
      <el-carousel-item class=" h-auto">
        <div style="justify-content:center;" class="flex items-center p-8  shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
          </div>
          <div>
            <span class="block text-gray-500">Ventas totales</span>
            <span class="block text-2xl font-bold">${{ totalPagos }}</span>
            <a :href="url + 'api/ventatotales/'" target="_blank">
              <span class="material-symbols-outlined">picture_as_pdf</span>
            </a>

          </div>
        </div>
      </el-carousel-item>
      <el-carousel-item class=" h-auto">
        <div style="justify-content:center;" class="h-auto flex items-center p-8  shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center items-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div class="justify-center items-center">
            <span class="block text-gray-500">Creditos</span>
            <span class="block text-2xl font-bold">${{ totalCreditos }}</span>
            <a :href="url + 'api/creditos/'" target="_blank">
              <span class="material-symbols-outlined">picture_as_pdf</span>
            </a>
          </div>
        </div>
      </el-carousel-item>
      <el-carousel-item class=" h-auto">
        <div style="justify-content:center;" class="h-auto flex items-center p-8  shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center items-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div class="justify-center items-center">
            <span class="block text-gray-500">Creditos Sin Factura</span>
            <span class="block text-2xl font-bold">${{ totalCreditosSinFactura }}</span>
            <a :href="url + 'api/creditossinfactura/'" target="_blank">
              <span class="material-symbols-outlined">picture_as_pdf</span>
            </a>
          </div>
        </div>
      </el-carousel-item>
      <el-carousel-item class=" h-auto">
        <div style="justify-content:center;" class="h-auto flex items-center p-8  shadow rounded-lg">
          <div
            class="inline-flex flex-shrink-0 items-center justify-center items-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div class="justify-center items-center">
            <span class="block text-gray-500">Creditos Con Factura</span>
            <span class="block text-2xl font-bold">${{ totalCreditosConFactura }}</span>
            <a :href="url + 'api/creditosconfactura/'" target="_blank">
              <span class="material-symbols-outlined">picture_as_pdf</span>
            </a>
          </div>
        </div>
      </el-carousel-item>
    </el-carousel>
    <!-- END FILE -->
  </div>
  <!-- TABLE DATA -->
  <div class="flex">
    <el-table :data="tableData" :default-sort="{ prop: 'id', order: 'ascending' }" style="width: 70%; margin: auto;"
      stripe>
      <el-table-column class="" label="">
        <template #default="{ row }">
          <button class="ml-5 px-5 my-5 h-3 w-3 rounded-full"
            :style="{ backgroundColor: row.requiere3 === 'Credito' ? 'Red' : 'Green' }"
            @click="handleEstadoClick(row)">
            <!-- Inicio de animacion-->
            <div class="container">
              <div class="left-side">
               <div class="card">
                <div class="card-line"></div>
                <div class="buttons"></div>
               </div>
               <div class="post">
                <div class="post-line"></div>
                <div class="screen">
                 <div class="dollar"></div>
                </div>
                <div class="numbers"></div>
                <div class="numbers-line2"></div>
               </div>
              </div>
              <div class="right-side">
               <div class="new"></div>
               
                <svg viewBox="0 0 451.846 451.847" height="512" width="512" xmlns="http://www.w3.org/2000/svg" class="arrow"><path fill="#cfcfcf" data-old_color="#000000" class="active-path" data-original="#000000" d="M345.441 248.292L151.154 442.573c-12.359 12.365-32.397 12.365-44.75 0-12.354-12.354-12.354-32.391 0-44.744L278.318 225.92 106.409 54.017c-12.354-12.359-12.354-32.394 0-44.748 12.354-12.359 32.391-12.359 44.75 0l194.287 194.284c6.177 6.18 9.262 14.271 9.262 22.366 0 8.099-3.091 16.196-9.267 22.373z"></path></svg>
              
              </div>
             </div>
             <!--Fin de animacion-->
          </button>
        </template>
      </el-table-column>
      <el-table-column prop="tradename" label="Cliente" sortable />
      <el-table-column prop="id" label="Factura" sortable />
      <el-table-column prop="pago" label="Costo" sortable />
      <el-table-column prop="requiere3" label="Estado">
        <template #default="{ row }">
          <span v-if="row.requiere3 === 'Credito'">{{ row.requiere3 }}</span>
          <span v-else>{{ row.requiere3 }}</span>
        </template>
      </el-table-column>
      <el-table-column prop="date2" label="Fecha de factura"></el-table-column>
    </el-table>
  </div>
  <!-- END TABLE DATA -->

</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';

export default {
  name: 'AdminHomeComponent',

  data: () => ({
    tableData: [],
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    totalPagos: 0,
    totalCreditos: 0,
    totalVentasSinFactura: 0,
    totalVentasConFactura: 0,
    totalCreditosSinFactura: 0,
    totalCreditosConFactura: 0,
  }),
  mounted() {
    this.fetchData();
    this.refresh();
  },
  methods: {
    refresh() {
      axios.get('completarOrden').then(res => {
        this.tableData = res.data.data.filter(row => row.tradename !== 'Particular');
        console.log(res.data.data);
      });
    },

    handleEstadoClick(row) {
      row.requiere3 = row.requiere3 === 'Pagado' ? 'Credito' : 'Pagado';
      axios.put(`actualizarEstado/${row.id}`, { requiere3: row.requiere3 })
        .then(response => {
          console.log('Estado actualizado correctamente:', response.data);
          this.fetchData();
          ElNotification({
            title: 'Actualizacion de datos',
            message: `Se actualizaron los datos.`,
            type: 'success'
          });
        })
        .catch(error => {
          console.error('Error al actualizar el estado:', error);
        });
    },

    async fetchData() {
      try {
        const responseOrdenes = await axios.get(this.urlApi + 'completarOrden');
        this.tableData = responseOrdenes.data.data.filter(row => row.tradename !== 'Particular');
        
        const responseTotalPagos = await axios.get(this.urlApi + 'totalPagos');
        this.totalPagos = responseTotalPagos.data.total;
        const responseTotalCreditos = await axios.get(this.urlApi + 'totalCreditos');
        this.totalCreditos = responseTotalCreditos.data.total;
        const responseTotalVentasSinFactura = await axios.get(this.urlApi + 'totalVentasSinFactura');
        this.totalVentasSinFactura = responseTotalVentasSinFactura.data.total;
        const responseTotalVentasConFactura = await axios.get(this.urlApi + 'totalVentasConFactura');
        this.totalVentasConFactura = responseTotalVentasConFactura.data.total;
        const responseTotalCreditosSinFactura = await axios.get(this.urlApi + 'totalCreditosSinFactura');
        this.totalCreditosSinFactura = responseTotalCreditosSinFactura.data.total;
        const responseTotalCreditosConFactura = await axios.get(this.urlApi + 'totalCreditosConFactura');
        this.totalCreditosConFactura = responseTotalCreditosConFactura.data.total;
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
    },

  }
}
</script>

<style>
.el-carousel__item {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: all 1.5s ease-in-out;
  border-radius: 10px;
  /* Added rounded corners */
  margin: 10px 0px;
  /* Added spacing between items */
}

.el-carousel__item h3 {
  color: #475669;
  opacity: 0.75;
  line-height: 200px;
  text-align: center;
  font-family: 'Arial', sans-serif;
  font-size: 24px;
}

.el-carousel__item:nth-child(2n) {
  border-radius: 10px;
  background-color: white;

}

.el-carousel__item:nth-child(2n+1) {
  border-radius: 10px;
  background-color: rgb(255, 255, 255);


}

.el-carousel__button:nth-child(2n+1) {
  height: 3px;
  /* Increased height for better visibility */
  width: 50px;
  /* Increased width for better click area */
  background-color: #464646;
  /* Lighter gray color */
}

.el-carousel__item.is-active {
  opacity: 1;
  transform: scale(1);
}

.el-carousel__item:not(.is-active) {
  opacity: 0.25;
  transform: scale(0.9);
}

.el-table-column label {
  color: #333;
  /* Darker text color for headers */
}

/*Animacion*/
/* From Uiverse.io by Admin12121 */ 
.container {
  display: flex;
  width: 110px;
  height: 20px;
  border-radius: 6px;
  transition:  opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
  opacity: 0; /* Comienza como invisible */
  margin-left: -67px;
  margin-top: -8px;
  
  
}

.container:hover {
  transform: scale(.3);
  width: 134px;
  opacity: 1; /* Hacer visible al hacer hover */
  visibility: visible; /* Hacerlo interactivo */
  
}

.container:hover .left-side {
  width: 100%;
  
}

.left-side { 
  
  background-color: #008000;
  width: 50px;
  height: 45px;
  border-radius: 4px;
  position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: 0.3s;
  flex-shrink: 0;
  overflow: hidden;
  border-radius: 25px;
  
}

.right-side {
  width: calc(100% - 130px);
  display: flex;
  align-items: center;
  overflow: hidden;
  cursor: pointer;
  justify-content: space-between;
  white-space: nowrap;
  transition: 0.3s;
  
}

.right-side:hover {
  background-color: #f9f7f9;
  
}

.arrow {
  width: 20px;
  height: 20px;
  margin-right: 20px;
  
}

.new {
  font-size: 23px;
  font-family: "Lexend Deca", sans-serif;
  margin-left: 20px;
  
}

.card {
  width: 70px;
  height: 46px;
  background-color: #c7ffbc;
  border-radius: 6px;
  position: absolute;
  display: flex;
  z-index: 10;
  flex-direction: column;
  align-items: center;
  -webkit-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
  -moz-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
  -webkit-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
}

.card-line {
  width: 65px;
  height: 13px;
  background-color: #80ea69;
  border-radius: 2px;
  margin-top: 7px;
  
}

@media only screen and (max-width: 480px) {
  .container {
    transform: scale(0.7);
  }

  .container:hover {
    transform: scale(0.74);
  }

  .new {
    font-size: 18px;
  }
}

.buttons {
  width: 8px;
  height: 8px;
  background-color: #379e1f;
  box-shadow: 0 -10px 0 0 #26850e, 0 10px 0 0 #56be3e;
  border-radius: 50%;
  margin-top: 5px;
  transform: rotate(90deg);
  margin: 10px 0 0 -30px;
}

.container:hover .card {
  animation: slide-top 1.2s cubic-bezier(0.645, 0.045, 0.355, 1) both;
}

.container:hover .post {
  animation: slide-post 1s cubic-bezier(0.165, 0.84, 0.44, 1) both;
}

@keyframes slide-top {
  0% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }

  50% {
    -webkit-transform: translateY(-70px) rotate(90deg);
    transform: translateY(-70px) rotate(90deg);
  }

  60% {
    -webkit-transform: translateY(-70px) rotate(90deg);
    transform: translateY(-70px) rotate(90deg);
  }

  100% {
    -webkit-transform: translateY(-8px) rotate(90deg);
    transform: translateY(-8px) rotate(90deg);
  }
}

.post {
  width: 63px;
  height: 75px;
  background-color: #dddde0;
  position: absolute;
  z-index: 11;
  bottom: 10px;
  top: 120px;
  border-radius: 6px;
  overflow: hidden;
}

.post-line {
  width: 47px;
  height: 9px;
  background-color: #545354;
  position: absolute;
  border-radius: 0px 0px 3px 3px;
  right: 8px;
  top: 8px;
}

.post-line:before {
  content: "";
  position: absolute;
  width: 47px;
  height: 9px;
  background-color: #757375;
  top: -8px;
}

.screen {
  width: 47px;
  height: 23px;
  background-color: #ffffff;
  position: absolute;
  top: 22px;
  right: 8px;
  border-radius: 3px;
}

.numbers {
  width: 12px;
  height: 12px;
  background-color: #838183;
  box-shadow: 0 -18px 0 0 #838183, 0 18px 0 0 #838183;
  border-radius: 2px;
  position: absolute;
  transform: rotate(90deg);
  left: 25px;
  top: 52px;
}

.numbers-line2 {
  width: 12px;
  height: 12px;
  background-color: #aaa9ab;
  box-shadow: 0 -18px 0 0 #aaa9ab, 0 18px 0 0 #aaa9ab;
  border-radius: 2px;
  position: absolute;
  transform: rotate(90deg);
  left: 25px;
  top: 68px;
}

@keyframes slide-post {
  50% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }

  100% {
    -webkit-transform: translateY(-70px);
    transform: translateY(-70px);
  }
}

.dollar {
  position: absolute;
  font-size: 16px;
  font-family: "Lexend Deca", sans-serif;
  width: 100%;
  left: 0;
  top: 0;
  color: #4b953b;
  text-align: center;
}

.container:hover .dollar {
  animation: fade-in-fwd 0.3s 1s backwards;
}

@keyframes fade-in-fwd {
  0% {
    opacity: 0;
    transform: translateY(-5px);
  }

  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>