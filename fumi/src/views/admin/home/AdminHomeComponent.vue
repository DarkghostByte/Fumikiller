<template>
    <!-- Importar Iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div class="">
    <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:black;"></i>

    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
      <div class="mr-6">
        <h1 class="text-4xl font-semibold mb-2">Inicio</h1>
      </div>
      <div class="flex flex-wrap items-start justify-end -mb-3">
      
      </div>
    </div>

    <!-- v-for="item in 4" :key="item"-->

      <el-carousel type="card" height="200px" class="m-5 border-radius:5 gb-gray  " >
        <el-carousel-item class=" h-auto">
          <div style="justify-content:center;" class="h-auto flex items-center p-8  shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center items-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div  class="justify-center items-center">
              <span class="block text-gray-500">Creditos</span>
              <span class="block text-2xl font-bold">$0.00</span>
              <a :href="url + 'api/creditos/'" target="_blank">
                <span class="material-symbols-outlined">picture_as_pdf</span>
              </a>
              
            </div>
          </div>
        </el-carousel-item>
        <el-carousel-item class="h-auto">
          <div style="justify-content:center;" class="flex items-center p-8  shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
            </div>
            <div>
              <span class="block text-gray-500">Venta sin Facturas</span>
              <span class="block text-2xl font-bold">$0.00</span>
              <a :href="url + 'api/ventsinfact/'" target="_blank">
                <span class="material-symbols-outlined">picture_as_pdf</span>
              </a>
            </div>
          </div>
        </el-carousel-item>
        <el-carousel-item class=" h-auto">
          <div style="justify-content:center;" class="flex items-center p-8 shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
              </svg>
            </div>
            <div>
              <span class="block text-gray-500">Venta Por Facturas</span>
              <span class="block text-2xl font-bold">$0.00</span> 
              <a :href="url + 'api/ventconfact/'" target="_blank">
                <span class="material-symbols-outlined">picture_as_pdf</span>
              </a>
            </div>
          </div>
        </el-carousel-item>
        <el-carousel-item class=" h-auto">
          <div style="justify-content:center;" class="flex items-center p-8  shadow rounded-lg">
            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
            </div>
            <div>
              <span class="block text-gray-500">Otro Apartado</span>
              <span class="block text-2xl font-bold">$0.00</span>
              <button class="" style="" ><span style="margin-bottom: -80px;" class=" px-10 py-5 material-symbols-outlined">picture_as_pdf</span></button>
              
            </div>
          </div>
        </el-carousel-item>
      </el-carousel >    
    <!-- END FILE -->
  </div>
<!-- TABLE DATA -->
<div class="flex">
  <el-table
      :data="tableData"
      :default-sort="{ prop: 'name', order: 'descending' }"
      style="width: 100%"
  >
  <el-table-column class="" label="Estado">
    <template #default>
      <button class="ml-5 px-5 h-3 w-3" style="background-color:red; border-radius: 15px;">

      </button>
    </template>
  </el-table-column>

      <el-table-column prop="clienteHome" label="Cliente" sortable width="155"  />
      <el-table-column prop="facturaHome" label="Factura"  sortable width="160"/>
      <el-table-column prop="costoHome" label="Costo"  sortable width="110"/>
      <el-table-column prop="fechaFacturacion" label="Fecha de facturacion" sortable width="180" />
      <el-table-column prop="fechaPago" label="Fecha de pago"  sortable width="160" />
      
      <el-table-column label="">
          <template #default>
            
          </template>
        </el-table-column>
  </el-table>
</div>
<!-- END TABLE DATA -->

</template>

<script>
  
  export default {
          name:'AdminHomeComponent',
          
          data:()=>({
                tableData:[],
                url: process.env.VUE_APP_ROOT_ASSETS,
                urlApi: process.env.VUE_APP_ROOT_API,
          }),
          mounted(){
            this.tableData = [{
                    clienteHome: 'Ferreteria',
                    facturaHome:'A0000-1',
                    costoHome: '$45.99',
                    fechaFacturacion: '00/00/0000',
                    fechaPago:'00/00/0000',
                    
                },
                {
                  clienteHome: 'Restaurante',
                    facturaHome:'A0000-2',
                    costoHome: '$45.99',
                    fechaFacturacion: '00/00/0000',
                    fechaPago:'00/00/0000',
                },
                {
                  clienteHome: 'Tienda Comercial',
                    facturaHome:'A0000-3',
                    costoHome: '$45.99',
                    fechaFacturacion: '00/00/0000',
                    fechaPago:'00/00/0000',
                },
                {
                  clienteHome: 'Local',
                    facturaHome:'A0000-4',
                    costoHome: '$45.99',
                    fechaFacturacion: '00/00/0000',
                    fechaPago:'00/00/0000',
                },
            ]
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
</script>

<style>
.el-carousel__item h3 {
  color: #475669;
  opacity: 0.75;
  line-height: 200px;
  margin: 0;
  text-align: center;
}

.el-carousel__item:nth-child(2n) {
  border-radius: 10px;
  background-color: white;
  
}

.el-carousel__item:nth-child(2n+1) {
  border-radius: 10px;
  background-color: rgb(255, 255, 255);


}
.el-carousel__button:nth-child(2n+1){
  height: 3px;
  width: 45px;
  background-color: rgb(234, 88, 12) ;
}
</style>