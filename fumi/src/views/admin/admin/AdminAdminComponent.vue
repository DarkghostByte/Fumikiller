<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Administración</h1>
    </div>

    <div  class="flex flex-wrap items-start justify-start">
          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-blue-500 hover:bg-blue-900 focus:bg-blue-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px; text-align: center; ;">
            <i class="fa-solid fa-city" aria-hidden="true" style="margin-top: 10%;
            margin-left: -5px; margin-right:10px; font-size:20px;"></i>                
            <h2>Ciudades</h2>
          </router-link>

          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-green-500 hover:bg-green-900 focus:bg-green-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
            <i class="fa-solid fa-house" aria-hidden="true" style="margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Colonias</h2>
          </router-link>

          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-orange-500 hover:bg-orange-900 focus:bg-orange-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
          <i class="fa-solid fa-apartment"></i>
            <i class="fa-solid fa-school-flag" aria-hidden="true" style="height:15px; margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Asentamientos</h2>
          </router-link>


          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-purple-500 hover:bg-purple-900 focus:bg-purple-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
            <i class="fa-regular fa-address-card" aria-hidden="true" style="margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Empleados</h2>
          </router-link>

          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-sky-500 hover:bg-sky-900 focus:bg-sky-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
            <i class="fa-solid fa-bug" aria-hidden="true" style="margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Problematicas</h2>
          </router-link>

          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-emerald-500 hover:bg-emerald-900 focus:bg-emerald-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
            <i class="fa-solid fa-house-chimney-user" aria-hidden="true" style="margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Productos Internos</h2>
          </router-link>

          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-amber-500 hover:bg-amber-900 focus:bg-amber-800 rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
            <i class="fa-solid fa-house-circle-xmark" aria-hidden="true" style="margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Productos Externos</h2>
          </router-link>

          <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-gradient-to-l from-pink-500 to-amber-500 hover:bg-gradient-to-r rounded-md ml-6 mb-5 shadow-lg" 
          style="width:290px; height:100px; font-size:22px;">
            <i class="fa-solid fa-user" aria-hidden="true" style="margin-top: 10%; 
            margin-left: -5px; margin-right:10px; "></i>                
            <h2>Ejemplo</h2>
          </router-link>
    </div>
  </div>



  
  </template>
  
  <script>
      import axios from 'axios';
      export default {
          name:'AdminClientsComponent',
          data:()=>({
            dialogVisible: false,
            dialogVisibleView: false,
            url:process.env.VUE_APP_ROOT_ASSETS,
            urlApi:process.env.VUE_APP_ROOT_API,
            tableData:[],
            selectedItem: null
          }),
          mounted(){
            this.refresh()
          },
          methods:{
            refresh(){
              this.tableData = []
              axios.get('clientes').then(res=>{
              this.tableData=res.data.data
            })
            },
            handleEdit(){
            },
            handleDelete(){
              axios.delete('clientes/'+this.selectedItem.id).then(res=>{
              console.log(res)
              this.refresh()
              this.dialogVisible=false
            })
            },
            eliminar(row){
              console.log(row)
              this.selectedItem=row
              this.dialogVisible=true
            },
            seleccionar(row){
            console.log(row)
            this.selectedItem=row
            this.dialogVisibleView=true
            },
            pdf(row){
            console.log(row)
            this.selectedItem=row
            },
          }
      }
  </script>

  <style>
  h2{
    margin-top: 8%;
    text-align: center;
  }
.box-item{
  position: absolute;
  text-align: center;
  justify-content: center;
  align-items: center;
}
</style>