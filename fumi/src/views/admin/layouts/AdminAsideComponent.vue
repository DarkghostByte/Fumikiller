<template>


    <aside id="Nav-Box" class="hidden sm:flex sm:flex-col">
      <router-link to="/auth/index" class="inline-flex items-center justify-center h-20 w-30 bg-orange-600 hover:bg-blue-800 focus:bg-blue-800">
          <img v-bind:src="url+'img/logofk.png'" class="flex items-center justify-center h-20">
        </router-link>
        <div  class="flex-grow flex flex-col justify-between text-gray-900 bg-orange-600" >
          <nav class="flex flex-col mx-4 my-6 space-y-4 ">
            <router-link to="/admin/home" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Home</span>
              <span class="material-symbols-outlined">home</span>
              <p id="HTxt" class="px-2">Inicio</p>
            </router-link>
            <router-link to="/admin/clients" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Clientes</span>
              <span class="material-symbols-outlined">group</span>
              <p id="HTxt" class="px-2">Clientes</p>
            </router-link>
            <router-link to="/admin/works" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Ordenes de trabajo</span>
              <span class="material-symbols-outlined">bug_report</span>
              <p id="HTxt" class="px-2">Ordenes</p>
            </router-link>
            <router-link to="/admin/calendar" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Agenda</span>
              <span class="material-symbols-outlined">calendar_clock</span>
              <p id="HTxt" class="px-2">Agenda</p>
            </router-link>
            <router-link to="/admin/admin" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Facturacion</span>
              <span class="material-symbols-outlined">paid</span>
              <p id="HTxt" class="px-2">Facturacion</p>
            </router-link>
            <router-link to="/admin/certificate" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Certificados</span>
              <span class="material-symbols-outlined">verified</span>
              <p id="HTxt" class="px-2">Certificados</p>
            </router-link>
            <router-link to="/admin/payments" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Gastos</span>
              <span class="material-symbols-outlined">payments</span>
              <p id="HTxt" class="px-2">Gastos</p>
            </router-link>
            <router-link to="/admin/admin" class="inline-flex items-center justify-center py-3 hover:text-gray-200 hover:bg-blue-700 focus:text-gray-400 focus:bg-blue-900 rounded-3xl">
              <span class="sr-only">Administracion</span>
              <span class="material-symbols-outlined">shield_person</span>
              <p id="HTxt" class="px-2">Admin</p>
            </router-link>
          </nav>
          <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
            <button class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-3xl">
              <span class="sr-only">Settings</span>
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
        </div>
      </aside>
</template>


<style>
nav { 
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 50px;
  font-size: 0; 
}
nav.span{
  margin-left: 15px;
}

span {
  color: black;
  display: inline-block;
}

nav:hover {
  font-size: 15px;
  width: 150px;
  color: black;
  transition: width 0.75s, font-size 0.75s;  
} 

</style>


<script>
    export default{
        name:'AdminAsideComponent',
        data:()=>({
            url:process.env.VUE_APP_ROOT_ASSETS,
        }),
    }
</script>