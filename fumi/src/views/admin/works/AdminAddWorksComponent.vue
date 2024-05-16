<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div>
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start" >
          <div class="flex flex-wrap items-start justify-end ">

            <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
            <i class="fa fa-rotate-left" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Devolver
          </router-link>

          </div>
        </div>
        <div class="mr-6">
          <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Ordenes de trabajo</h1>
        </div>

        <!-- TABLE DATA -->
        <div class="flex ml-5">
          <el-form 
          :model="form" 
          label-width="auto" 
          style="max-width: 100%"
          :label-position="'top'"
          ref="formRef" 
          :rules="rules">
            
            <!-- DATOS DE LA FILA DE CLIENTES -->  
            <p>Cliente</p>
            <div class="flex">
              <el-form-item prop="name" label="Nombre del comercio:" class="px-10" style="width: 25%">
                <el-input v-model="form.tradename" class="px-1" 
                placeholder="Ingresa el nombre del comercio"
                disabled/>
              </el-form-item>
              <el-form-item prop="name" label="Nombres:" class="px-8">
                <el-input v-model="form.name" class="px-1" 
                placeholder="Ingresa sus nombres"
                disabled/>
              </el-form-item>
              <el-form-item prop="name" label="Apellido paterno:" class="px-6">
                <el-input v-model="form.lastname1" class="px-1" 
                placeholder="Ingresa su primer apellido"
                disabled/>
              </el-form-item>
              <el-form-item prop="name" label="Apellido materno:" class="px-5">
                <el-input v-model="form.lastname2" class="px-1" 
                placeholder="Ingresa su segundo apellido"
                disabled/>
              </el-form-item>
              <el-form-item prop="name" label="Apellido materno:" class="px-5">
                <el-input v-model="form.id" class="px-1" 
                placeholder="Ingresa su segundo apellido"
                disabled/>
              </el-form-item>
            </div>

            <!-- FILA DE LAS PLAGAS (PROBLEMATICA) --> 
            <p>Problematica</p>
            <div class="flex" style="width:100%;">
              <el-form-item prop="problema1" class="px-10" label="Tipo de plaga #1" style="width: 25%" >
                <el-select v-model="form.plague1" placeholder="Selecciona la plaga" >
                  <el-option label="Cucarachas" value="cucarachas" />
                  <el-option label="Pulgas" value="pulgas" />
                  <el-option label="Chinches" value="chinches" />
                  <el-option label="Cucaracha de cocina" value="cucaracha de cocina" />
                  <el-option label="Garrapatas" value="garrapatas" />
                  <el-option label="Palomillas" value="palomillas" />
                  <el-option label="Roedores" value="roedores" />
                  <el-option label="Hormigas" value="hormigas" />
                </el-select>
              </el-form-item>
              <el-form-item class="px-8" label="Tipo de plaga #2" style="width: 25%" >
                <el-select prop="problema2" v-model="form.plague2" placeholder="Selecciona la plaga" >
                  <el-option label="Cucarachas" value="cucarachas" />
                  <el-option label="Pulgas" value="pulgas" />
                  <el-option label="Chinches" value="chinches" />
                  <el-option label="Cucaracha de cocina" value="cucaracha de cocina" />
                  <el-option label="Garrapatas" value="garrapatas" />
                  <el-option label="Palomillas" value="palomillas" />
                  <el-option label="Roedores" value="roedores" />
                  <el-option label="Hormigas" value="hormigas" />
                </el-select>
              </el-form-item>
            </div>


            <!-- FILA DE FECHAS --> 
            <p>Fechas</p>
            <div class="flex">
              <el-form-item prop="dateOrden" class="px-10" label="Fecha de orden:" style="width: 250px">
                <el-col :span="11">
                  <el-date-picker
                    v-model="form.date1"
                    type="date"
                    placeholder="Orden" 
                    format="YYYY/MM/DD"
                    value-format="YYYY-MM-DD"
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item prop="dateAsistir" class="px-10" label="Fecha para asistir:" style="width: 250px" >
                <el-col :span="11">
                  <el-date-picker
                    v-model="form.date2"
                    type="date"
                    placeholder="Orden"
                    format="YYYY/MM/DD"
                    value-format="YYYY-MM-DD"
                  />
                </el-col>
              </el-form-item>

              <el-form-item prop="timeInicial" class="px-10" label="De hora:">
                <el-col :span="11">
                  <el-time-select
                    v-model="form.time1"
                    style="width: 220px"
                    start="08:30"
                    step="00:15"
                    end="20:30"
                    format="hh:mm A"
                    placeholder="Seleccionar hora"
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item prop="timeFinal" class="px-10" label="A hora:">
                <el-col :span="11">
                  <el-time-select
                    v-model="form.time2"
                    style="width: 220px"
                    start="08:30"
                    step="00:15"
                    end="20:30"
                    format="hh:mm A"
                    placeholder="Seleccionar hora"
                  />
                </el-col>
              </el-form-item>
            </div>

            <!-- FILA DE TIPO DE CONTRATACION -->
            <p >Contratacion:</p>
            <div class="flex">
              <el-form-item prop="recruitment_data" label="" class="px-10">
                <el-checkbox-group v-model="form.hiring">
                  <el-checkbox label="Nada" value="Nada"></el-checkbox>
                  <el-checkbox label="Presupuesto" value="Presupuesto"></el-checkbox>
                  <el-checkbox label="Fumigar" value="Fumigar"></el-checkbox>
                  <el-checkbox label="Garantia" value="Garantia"></el-checkbox>
                  <el-checkbox label="Cortesia" value="Cortesia"></el-checkbox>
                </el-checkbox-group>
              </el-form-item>
            </div>

            <!-- FILA DE REQUIERE DE -->
            <p>Requiere de:</p>
            <div class="flex">
              <el-form-item prop="requiere" label="" class="px-10">
                <el-checkbox-group v-model="form.requires">
                  <el-checkbox label="Nada" value="Nada"></el-checkbox>
                  <el-checkbox label="Factura" value="Factura"></el-checkbox>
                  <el-checkbox label="Certificado" value="Certificado"></el-checkbox>
                  <el-checkbox label="Remision" value="Remision"></el-checkbox>
                </el-checkbox-group>
              </el-form-item>
            </div>

            <div style="color:white; display:flex; justify-content: center; transition:10s;" >
              <router-link to="/admin/works">
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
      import {useRoute} from 'vue-router';
      import axios from 'axios';
      export default {
          name:'AdminAddWorksComponent',
          data:()=>({
                tableData:[],
                formRef:undefined,
                uploadRef:undefined,
                url:process.env.VUE_APP_ROOT_ASSETS,
                urlApi:process.env.VUE_APP_ROOT_API,
                form:{
                name:'',
                lastname1:'',
                lastname2:'',
                id_cliente:'',
                plague1:'Cucharachas',
                plague2:'Hormigas',
                date1:'2024-05-16',
                date2:'2024-05-17',
                time1:'08:30',
                time2:'09:00',
                hiring: ['Nada'],
                requires:['Nada']
            },
            rules:{
              plague1:[
                  { required:true, message:'El nombre es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
              ],
              plague2:[
                  { required:true, message:'El apellido paterno es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
              ],
              date1:[
                  { required:true, message:'El apellido materno es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
              ],
              date2:[
                  { required:true, message:'El apellido materno es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
              ],
              time1:[
                  { required:true, message:'El domilicio es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
              ],
              time2:[
                  { required:true, message:'El numero de domilicio es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
              ],
              hiring:[
                  { required:true, message:'El codigo postal es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'La longitud debería ser de 5 digitos',trigger:'blur'  }
              ],
              requires:[
                  { required:true, message:'El codigo postal es requerido', trigger:'blur'},
                  { min:3, max: 100, message:'La longitud debería ser de 5 digitos',trigger:'blur'  }
              ],
          }
          }),
          mounted(){
            this.refresh()
            const route = useRoute()
            this.id = route .params.id
            axios.get('clientes/'+this.id).then(res=>{
              console.log(res)
              let datos = res.data.data
              const clienteData = res.data.data;
              this.form.id_cliente = clienteData.id;
              this.form.name = datos.name
              this.form.lastname1 = datos.lastname1
              this.form.lastname2 = datos.lastname2
              this.form.tradename = datos.tradename
            })          
          },
          methods:{
            errorUpload(error){
              console.log(error)
            },
            refresh(){
              this.tableData = []
              axios.get('orden').then(res=>{
              this.tableData=res.data.data
            })
            },
            successUpload(response){
                console.log(response)
                this.refresh()
                axios.post('orden',this.form).then(response=>{
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