<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      
        <div class="flex flex-wrap items-start justify-end ">

          <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
            <i class="fa fa-search" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Consultar Clientes
          </router-link>

          <router-link to="/admin/clients/add-clients" class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3" style="color:black">
            <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Nuevo Cliente
          </router-link>

        </div>

    </div>

    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Clientes</h1>
    </div>


        <!-- TABLE INSERT -->
        <!-- Primera Fila -->
        <div class="flex">
          <el-form 
          :model="form1" 
          label-width="auto" 
          style="max-width: 100%" 
          ref="formRef" 
          :rules="rules"
          :label-position="'top'">

          <!--
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Nombres:</p>
              <p class="px-20 ml-12 ">Apellido Paterno:</p>
              <p class="px-5">Apellido Materno:</p>
              <p class="px-20 pr-5">Nombre Comercial:</p>
            </div>
            -->
            <p class="px-5">Datos del cliente:</p>
            <div class="flex">
              <el-form-item prop="name" label="Nombres:" class="px-2" style="width: 240px;">
                <el-input v-model="form1.name" class="px-1" 
                placeholder="Ingresa sus nombres"/>
              </el-form-item>
              <el-form-item prop="lastname1" label="Apellidos Paterno:" class="px-5">
                <el-input v-model="form1.lastname1" class="px-1"
                placeholder="Ingresa su apellido paterno"/>
              </el-form-item>
              <el-form-item prop="lastname2" label="Apellidos Materno:" class="px-5">
                <el-input v-model="form1.lastname2" class="px-1"
                placeholder="Ingresa su apellido materno"/>
              </el-form-item>
              <el-form-item prop="tradename" label="Nombre Comercial:" class="px-10">
                <el-input v-model="form1.tradename" class=""
                placeholder="Ingresa el nombre del comercio"/>
              </el-form-item>
            </div>

            <!-- Segunda Fila -->
            <br>
            <p class="px-5">Domicilio:</p>
            <!--
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Tipo de Calle:</p>
              <p class="px-12 ml-12 ">Domicilio:</p>
              <p class="px-28 pr-">Codigo Postal:</p>
              <p class="pr-5">Colonia:</p>
            </div>
            -->
            <div class="flex">
              <el-form-item prop="street" label="Tipo de calle:" class="px-2">
                <el-select v-model="form1.street" placeholder="Tipo de calle" class=" px-1" style="width: 223px;">
                  <el-option label="Av." value="Av." />
                  <el-option label="Calle" value="Calle" />
                  <el-option label="Callejón" value="Callejon" />
                </el-select>
              </el-form-item>
              
              <el-form-item prop="home" label="Domicilio:" class=" px-7" style="width: 350px;" >
                <el-input v-model="form1.home" class="px-1"
                placeholder="Ingresa el domicilio"/>
              </el-form-item>

              <el-form-item prop="cp" label="Codigo postal:" class="px-4">
                <el-input v-model="form1.cp" class="px-1"
                placeholder="Ingresa el codigo postal"/>
              </el-form-item>

              
            </div>

            <!-- Tercera Fila -->
            <!--
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Ciudad:</p>
              <p class="px-24 ml-12 ">Tipo de lugar:</p>
            </div>
            -->
            <div class="flex">
              <el-form-item prop="cologne" label="Colonia:" class="px-3">
                <el-select v-model="form1.cologne" placeholder="Selecciona la  colonia" class="px-1" style="width: 220px;" >
                  <el-option label="Primera de mayo" value="primerademayo" />
                  <el-option label="Madero" value="madero" />
                </el-select>
              </el-form-item>
              <el-form-item prop="city" label="Cuidad:" class="px-7" style="width: 25%">
                <el-select v-model="form1.city" placeholder="Selecciona la cuidad">
                  <el-option label="Nuevo Casas Grandes" value="ncg" />
                  <el-option label="Casas Grandes" value="cg" />
                </el-select>
              </el-form-item>
              <el-form-item prop="type_of_place" label="Tipo de comercio:" class="px-4" style="width: 25%">
                <el-select v-model="form1.type_of_place" placeholder="Selecciona el tipo de lugar">
                  <el-option label="Restaurante" value="restaurante" />
                  <el-option label="Bodega" value="bodega" />
                </el-select>
              </el-form-item>
            </div>

            <!-- Datos del domicilio Fila -->
            <div class="px-5" > 
              <br>
              <p>Datos del domicilio:</p>
              <el-form-item prop="description" label="Decripcion:"  class="pt-4 px-10"  >
                <el-input v-model="form1.description" type="textarea" style="height:50px;"
                placeholder="Agrega una descripcion"/>
              </el-form-item>
              <el-form-item prop="how_to_get" label="Como llegar:" class="pt-5 px-10" >
                <el-input v-model="form1.how_to_get" type="textarea" 
                placeholder="Agrega como llegar al domicilio"/>
              </el-form-item>
            </div>
            
            <!-- Sexta Fila -->
            <br>
            <p class="px-5">Contacto:</p>
            <!--
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Numero de Celular:</p>
              <p class="px-12">Numero Fijo:</p>
            </div>
            -->
            <div class="flex">
              <el-form-item prop="cell_phone" label="Numero de celular:" class="px-10">
                <el-input v-model="form1.cell_phone" 
                placeholder="Celular"/>
              </el-form-item>
              <el-form-item prop="number_fixed_number" label="Numero fijo:" class="px-10">
                <el-input v-model="form1.number_fixed_number" 
                placeholder="Celular"/>
              </el-form-item>
            </div>

            <!-- Septima Fila -->
            <!--
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Forma de contacto:</p>
              <p class="px-12">Especificar:</p>
            </div>
            -->
            
            <div class="flex">
              <el-form-item prop="contact_form" label="Forma de contacto:" class="px-10" style="width: 25%">
                <el-select v-model="form1.contact_form" placeholder="Selecciona la  forma de contacto" class="">
                  <el-option label="Facebook" value="facebook" />
                  <el-option label="Barda" value="barda" />
                </el-select>
              </el-form-item>
              <el-form-item prop="specify" label="Especificar:" class="px-16">
                <el-input v-model="form1.specify" 
                placeholder="Especificar"/>
              </el-form-item>
            </div>
                        
            <div style="color:white; display:flex; justify-content: center; transition:10s;" >
              <router-link to="/admin/clients">
                <el-button @click="submitForm(formRef)" 
                class="w-40 h-16 mt-5" 
                style="color:white; background-color:#11639c; border-radius:40px; font-size:25px;" 
                type="info" 
                round>Crear</el-button>
              </router-link>
            </div>
          </el-form>
        </div>
        <!-- END TABLE DATA -->
    </div>
  
  </template>
  
  <script>
    import { ElNotification } from 'element-plus';
    import axios from 'axios';
      export default {
          name:'AdminHomeComponent',
          data:()=>({
            formRef:undefined,
            uploadRef:undefined,
            url:process.env.VUE_APP_ROOT_ASSETS,
            urlApi:process.env.VUE_APP_ROOT_API,
            form1:{
                name:'Emiliano',
                lastname1:'Mosqueda',
                lastname2:'Gamez',
                tradename:'ShopEmi',
                street:'Calle',
                home:'Juan Quezada #1258',
                cp:'11111',
                cologne:'Dublan',
                city:'Nuevo Casas Grandes',
                type_of_place:'Comercio',
                description:'Comercio de dos pisos, contraesquina de un gimnasio',
                how_to_get:'A dos calles del gimnasio municipal',
                cell_phone: '6363333333',
                number_fixed_number: '6360000000',
                contact_form:'Radio',
                specify:'En la estacion 104.9',
            },
            rules:{
              
                name:[
                    { required:true, message:'El nombre es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
                ],
                lastname1:[
                    { required:true, message:'El apellido paterno es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
                ],
                lastname2:[
                    { required:true, message:'El apellido materno es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
                ],
                street:[
                    { required:true, message:'El tipo de calle es requerido', trigger:'blur'},
                ],
                home:[
                    { required:true, message:'El domilicio es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
                ],
                cp:[
                    { required:true, message:'El codigo postal es requerido', trigger:'blur'},
                    { min:5, max: 5, message:'La longitud debería ser de 5 digitos',trigger:'blur'  }
                ],
                cologne:[
                    { required:true, message:'La colonia es requerido', trigger:'blur'},
                ],
                city:[
                    { required:true, message:'La colonia es requerido', trigger:'blur'},
                ],
                type_of_place:[
                    { required:true, message:'La colonia es requerido', trigger:'blur'},
                ],
                description:[
                    { required:true, message:'La descripcion es requerido', trigger:'blur'},
                    { min:3, max: 500, message:'Longitud debería ser 3 a 500',trigger:'blur'  }
                ],
                how_to_get:[
                    { required:true, message:'Como llegar es requerido', trigger:'blur'},
                    { min:3, max: 500, message:'Longitud debería ser 3 a 500',trigger:'blur'  }
                ],
                cell_phone:[
                    { required:true, message:'El numero de celular es requerido', trigger:'blur'},
                    { min:10, max: 20, message:'Longitud debería ser 10 a 20',trigger:'blur'  }
                ],
                number_fixed_number:[
                    { required:true, message:'El numero fijo es requerido', trigger:'blur'},
                    { min:10, max: 20, message:'Longitud debería ser 10 a 20',trigger:'blur'  }
                ],
                contact_form:[
                    { required:true, message:'La forma de contacto es requerido', trigger:'blur'},
                ],
                specify:[
                    { required:true, message:'Especificar es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 500',trigger:'blur'  }
                ],
            }
            
        }),
          mounted(){
            
          },
          methods:{
            errorUpload(error){
              console.log(error)
            },

            successUpload(response){
                console.log(response)
                axios.post('clientes',this.form1).then(response=>{
                    console.log(response)
                    ElNotification({
                        title:'Alerta',
                        message:'Registro insertado correctamente',
                        type:'success'
                    })
                }).catch(error=>{
                    console.log(error)
                    ElNotification({
                        title:'Error',
                        message:'Favor de llenar los campos',
                        type:'error'
                    })
                })
            },

            submitForm(){
                this.$refs.formRef.validate( (valid,fields)=>{
                    if(valid){
                        console.log(fields);
                        this.successUpload();
                    }else{
                        ElNotification({
                            title:'Error',
                            message:'Favor de llenar los campos',
                            type:'error'
                        })
                    }
                } )
            }
        }
    }
  </script>