<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
        <div class="mr-6">
          <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Clientes</h1>
        </div>


        <div class="flex flex-wrap items-start justify-end mb-3">

          <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
            <i class="fa fa-search" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Consultar Cliente
          </router-link>

          <router-link to="/admin/clients/add-clients" class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3" style="color:black">
            <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Nuevo Cliente
          </router-link>

          <router-link to="/admin/clients/edit-clients" class="inline-flex px-5 py-3 text-white bg-yellow-400 hover:bg-yellow-500 focus:bg-yellow-600 rounded-md ml-6 mb-3" style="color:black">
            <i class="fa fa-pencil" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Editar Cliente
          </router-link>

        </div>


    </div>
        <!-- TABLE DATA -->

        <div class="flex">
          <el-form :model="form" label-width="auto" style="max-width: 100%">
            <div class="flex">
              <el-form-item label="Nombres: ">
                <el-input v-model="form.name" 
                placeholder="Ingresa sus nombres"/>
              </el-form-item>
              <el-form-item label="Apellido paterno: ">
                <el-input v-model="form.lastname1" 
                placeholder="Ingresa su primer apellido"/>
              </el-form-item>
              <el-form-item label="Apellido materno: ">
                <el-input v-model="form.lastname2" 
                placeholder="Ingresa su segundo apellido"/>
              </el-form-item>
            </div>

            <el-form-item label="Nombre comercial: "
            style="width: 50%">
              <el-input v-model="form.comercio" 
              placeholder="Ingresa el nombre del comercio"/>
            </el-form-item>

            <p>Domicilio</p>
            <div class="flex">
              <el-form-item label="Tipo de calle: ">
                <el-input v-model="form.name" 
                placeholder="Tipo de calle"/>
              </el-form-item>
              <el-form-item label="Domicilio: "
              style="width: 60%">
                <el-input v-model="form.name1" 
                placeholder="Ingresa la colonia"/>
              </el-form-item>
              <el-form-item label="Codigo postal: ">
                <el-input v-model="form.name" 
                placeholder="Ingresa el codigo postal"/>
              </el-form-item>
            </div>
            <div class="flex">
              <el-form-item label="Colonia: "
              style="width: 50%">
                <el-select v-model="form.col" placeholder="Selecciona la  colonia">
                  <el-option label="Primera de mayo" value="primerademayo" />
                  <el-option label="Madero" value="madero" />
                </el-select>
              </el-form-item>
              <el-form-item label="Cuidad: "
              style="width: 50%">
                <el-select v-model="form.cui" placeholder="Selecciona la cuidad">
                  <el-option label="Nuevo Casas Grande" value="ncg" />
                  <el-option label="Casas Grandes" value="cg" />
                </el-select>
              </el-form-item>
              <el-form-item label="Tipo de lugar: "
              style="width: 50%">
                <el-select v-model="form.lug" placeholder="Selecciona el tipo de lugar">
                  <el-option label="Restaurante" value="restaurante" />
                  <el-option label="Bodega" value="bodega" />
                </el-select>
              </el-form-item>
            </div>

            <el-form-item label="Descripcion: ">
              <el-input v-model="form.desc" type="textarea" 
              placeholder="Agrega una descripcion"/>
            </el-form-item>

            <el-form-item label="Como llegar: ">
              <el-input v-model="form.lleg" type="textarea" 
              placeholder="Agrega como llegar al domicilio"/>
            </el-form-item>

            <div class="flex">
              <el-form-item label="Numero de celular: ">
                <el-input v-model="form.phone1" 
                placeholder="Celular"/>
              </el-form-item>
              <el-form-item label="Numero fijo: ">
                <el-input v-model="form.phone2" 
                placeholder="Celular"/>
              </el-form-item>
            </div>

            <div class="flex">
              <el-form-item label="Forma de contacto: "
              style="width: 30%">
                <el-select v-model="form.contac" placeholder="Selecciona la  forma de contacto">
                  <el-option label="Facebook" value="facebook" />
                  <el-option label="Barda" value="barda" />
                </el-select>
              </el-form-item>
              <el-form-item label="Especificar: ">
                <el-input v-model="form.espe" 
                placeholder="Especifica"/>
              </el-form-item>
            </div>
            
            <el-form-item>
              <el-button type="success" @click="onSubmit" round plain>Crear</el-button>
              <el-button type="success" round>Success</el-button>
            </el-form-item>

            <div class="mb-4">
              <el-button>Default</el-button>
              <el-button type="primary">Primary</el-button>
              <el-button type="success">Success</el-button>
              <el-button type="info">Info</el-button>
              <el-button type="warning">Warning</el-button>
              <el-button type="danger">Danger</el-button>
            </div>
            <div class="mb-4">
              <el-button round>Round</el-button>
              <el-button type="primary" round>Primary</el-button>
              <el-button type="success" round>Success</el-button>
              <el-button type="info" round>Info</el-button>
              <el-button type="warning" round>Warning</el-button>
              <el-button type="danger" round>Danger</el-button>
            </div>
            <div class="mb-4">
              <el-button plain>Plain</el-button>
              <el-button type="primary" plain>Primary</el-button>
              <el-button type="success" plain>Success</el-button>
              <el-button type="info" plain>Info</el-button>
              <el-button type="warning" plain>Warning</el-button>
              <el-button type="danger" plain>Danger</el-button>
            </div>
            <div>
              <el-button color="#626aef" :dark="isDark">Default</el-button>
              <el-button color="#626aef" :dark="isDark" plain>Plain</el-button>
          
              <el-button color="#626aef" :dark="isDark" disabled>Disabled</el-button>
              <el-button color="#626aef" :dark="isDark" disabled plain
                >Disabled Plain</el-button
              >
            </div>
          </el-form>
        </div>
        <!-- END TABLE DATA -->
    </div>
  
  </template>
  
  <script>
      export default {
          name:'AdminHomeComponent',
          
          data:()=>({
                tableData:[],
                form:{
                name:'',
                lastname1:'',
                lastname2:'',
                comercio:'',
                col:'',
                cui:'',
                lug:'',
                desc:'',
                lleg:'',
                phone1:'',
                phone2:'',
                contac:'',
                espe:'',
            },
          }),
          mounted(){
            
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
  </script>