<template>
  <div>
    <div class="flex mr-6">
      <h1 class="py-6 px-5 text-4xl font-semibold mb-2 flex-grow">Caja</h1>
    </div>

    <div class="container mx-auto">
      <div class="mb-4 centerFiltros">
        <el-date-picker class="mx-2" v-model="selectedDate" @change="filterDate1" type="date" format="YYYY-MM-DD"
          value-format="DD-MM-YYYY" placeholder="Seleccionar el rango de fecha" style="width: 25%;" />
        <el-date-picker class="mx-2" v-model="selectedDate1" @change="filterDate1" type="date" format="YYYY-MM-DD"
          value-format="DD-MM-YYYY" placeholder="Seleccionar el rango de fecha" style="width: 25%;" />
        <el-input class="px-2" placeholder="Buscar por descripcion" v-model="searchQuery1" @input="filterData1"
          style="width: 25%;" />
        <el-input class="px-2" placeholder="Buscar por monto" v-model="searchQuery2" @input="filterData2"
          style="width: 25%;" />
        <el-input class="px-2" placeholder="Buscar por Caja/Banco/Deposito" v-model="searchQuery3" @input="filterData3"
          style="width: 25%;" />
      </div>
    </div>

    <div class="flex flex-wrap items-center justify-center mt-6">
      <h1 style="width:100px;" class="text-2xl font-bold">CAJA</h1>

      <a :href="url + 'api/pdfIngreso/'" target="_blank"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-blue-600 hover:bg-blue-1000 focus:bg-blue-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style=" width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalIngresos }}</h3>
          <h2>Ingresos</h2>
        </div>
        <i class="fa-solid fa-solid fa-money-bill-trend-up fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>
      </a>

      <a :href="url + 'api/pdfEgreso/'" target="_blank"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-green-600 hover:bg-green-1000 focus:bg-green-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalCajaEgreso }}</h3>
          <h2>Egresos</h2>
        </div>
        <i class="fa-solid fa-money-bill fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>

      </a>

      <a :href="url + 'api/pdfSaldo/'" target="_blank"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-orange-600 hover:bg-orange-1000 focus:bg-orange-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalSaldo }}</h3>
          <h2>Saldo</h2>
        </div>
        <i class="fa-solid fa-cash-register fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>
      </a>

      <a :href="url + 'api/pdfCaja/'" target="_blank"
          class="btnPdf inline-flex rounded-md ml-6 mb-5 justify-center items-center"
          style="width:80px; height:50px; text-align: center; ">
          <div class="flex">
            <i class="fa-solid fa-file-pdf pdfBtn" style="font-size: 25px;"></i>
          </div>
        </a>
    </div>

    <div class="flex flex-wrap items-center justify-center">
      <h1 style="width:100px;" class="text-2xl font-bold">BANCOS</h1>
      <Button
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-lime-600 hover:bg-lime-1000 focus:bg-lime-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalCajaBanco }}</h3>
          <h2>Ingresos</h2>
        </div>
        <i class="fa-solid fa-solid fa-money-bill-trend-up fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>
      </Button>

      <Button
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-rose-600 hover:bg-rose-1000 focus:bg-rose-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalBancoEgreso }}</h3>
          <h2>Egresos</h2>
        </div>
        <i class="fa-solid fa-money-bill fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>

      </Button>

      <Button
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-cyan-600 hover:bg-cyan-1000 focus:bg-cyan-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalSaldoBanco }}</h3>
          <h2>Saldo</h2>
        </div>
        <i class="fa-solid fa-cash-register fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>
      </Button>

      <a :href="url + 'api/pdfBanco/'" target="_blank"
          class="btnPdf inline-flex rounded-md ml-6 mb-5 justify-center items-center"
          style="width:80px; height:50px; text-align: center; ">
          <div class="flex">
            <i class="fa-solid fa-file-pdf pdfBtn" style="font-size: 25px;"></i>
          </div>
        </a>
    </div>

    <div class="table-container mt-2" style="width:100%;">
      <div class="flex items-start justify-center"> 
        <div class="mx-6 row">
          <div class="flex mb-2 items-center justify-center">
            <h1 class="txtH1">Resumen Ingresos</h1>
            <el-button @click="dialogVisibleCreate = true" class="ml-2 el-button el-button--primary">
              <i class="fa-solid fa-solid fa-money-bill-trend-up" aria-hidden="true"
                style="margin-left: -5px; margin-right:5px;"></i>
              Insertar Ingreso
            </el-button>
          </div>
          <div class="flex">
            <el-table :data="filteredData1" :default-sort="{ prop: 'id', order: 'ascending' }" stripe
              style="width:100%;">
              <el-table-column label="Fecha" prop="dateIngreso" width="120" sortable />
              <el-table-column label="Descripcion" prop="descriptionIngreso" width="150" sortable />
              <el-table-column label="Caja/Banco" prop="dataIngreso" width="150" sortable />
              <el-table-column label="Monto" prop="montoIngreso" width="150" sortable
                :formatter="(row) => formatNumber(row, 'montoIngreso')">
              </el-table-column>
            </el-table>
          </div>
          <div class="flex">
            <el-table :data="filteredData3" :default-sort="{ prop: 'id', order: 'ascending' }" stripe
              style="width:100%; text-align:center;">
              <el-table-column prop="date1" label="Fecha" width="" />
              <el-table-column prop="id_orden" label="O. Trabajo" width="" />
              <el-table-column prop="facturaOrden" label="Factura" width="" />
              <el-table-column label="Datos" width="130">
                <template #default="scope">
                  {{ scope.row.requiere3 }}
                </template>
              </el-table-column>
              <el-table-column prop="pago" label="Monto" width="" :formatter="(row) => formatNumber(row, 'pago')">
              </el-table-column>
            </el-table>
          </div>
        </div>

        <div class="mx-6 row">
          <div class="flex mb-2 items-start justify-center">
            <h1 class="txtH1">Resumen Egresos</h1>
            <el-button @click="dialogVisibleCreate1 = true" class="ml-2 el-button el-button--primary">
              <i class="fa-solid fa-money-bill" aria-hidden="true"
                style="margin-top:5px; margin-left: -5px; margin-right:5px;"></i>
              Insertar Egreso
            </el-button>
          </div>
          <div class="flex">
            <el-table :data="filteredData2" :default-sort="{ prop: 'id', order: 'ascending' }" stripe
              style="width:100%;">
              <el-table-column label="Fecha" prop="dateEgresos" width="" sortable />
              <el-table-column label="Descripcion" prop="descriptionEgresos" width="" sortable />
              <el-table-column label="Departamento" prop="comercio" width="" sortable />
              <el-table-column label="Caja/Banco/Deposito" prop="dataEgresos" width="" sortable />
              <el-table-column label="Monto" prop="montoEgresos" width="" sortable
                :formatter="(row) => formatNumber(row, 'montoEgresos')"></el-table-column>
            </el-table>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL 1 -->
    <el-dialog v-model="dialogVisibleCreate" title="Nuevo Ingreso" width="18%">
      <el-form :model="form1" label-width="auto" style="max-width: 100%" ref="formRef" :rules="rules"
        :label-position="'top'">
        <div class="row">
          <el-form-item prop="dataIngreso" label="Datos">
            <el-radio-group v-model="form1.dataIngreso" size="large">
              <el-radio-button label="Caja" value="Caja" />
              <el-radio-button label="Banco" value="Banco" />
            </el-radio-group> 
          </el-form-item>
          <el-form-item prop="dateIngreso" label="Fecha:">
            <el-col :span="11" style="width: 240px">
              <el-date-picker v-model="form1.dateIngreso" type="date" placeholder="Fecha del ingreso:"
                format="DD/MM/YYYY" value-format="DD-MM-YYYY" />
            </el-col>
          </el-form-item>
          <el-form-item prop="descriptionIngreso" label="Descripcion:" style="width: 240px;">
            <el-input v-model="form1.descriptionIngreso" type="textarea" class="px-1"
              placeholder="Ingresa la descripcion:" maxlength="100" show-word-limit />
          </el-form-item>
          <el-form-item prop="montoIngreso" label="Monto:" style="width: 240px;">
            <el-input v-model="form1.montoIngreso" class="px-1" placeholder="Ingresa el monto:" type="number" />
          </el-form-item>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="dialogVisibleCreate = false">Cancelar</el-button>
          <el-button type="primary" @click="createIngreso">Crear</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 1 -->

    <!-- MODAL 2 -->
    <el-dialog v-model="dialogVisibleCreate1" title="Nuevo Egreso" width="20%">
      <el-form :model="form2" label-width="auto" style="max-width: 100%" ref="formRef" :rules="rules2"
        :label-position="'top'">
        <div class="row">
          <el-form-item prop="dataEgresos" label="Datos">
            <el-radio-group v-model="form2.dataEgresos" size="large">
              <el-radio-button label="Caja" value="Caja" />
              <el-radio-button label="Banco" value="Banco" />
              <el-radio-button label="Deposito" value="Deposito" />
            </el-radio-group> 
          </el-form-item>
            <el-form-item prop="id_departamento1" label="Departamento:" class="px-2" style="width: auto;">
              <el-select v-model="form2.id_departamento1" placeholder="Selecciona el departamento:">
                <el-option v-for="selectDepartamento in departamentos" :key="selectDepartamento.id"
                  :label="selectDepartamento.comercio" :value="selectDepartamento.id" />
              </el-select>
          </el-form-item>
          <el-form-item prop="dateEgresos" label="Fecha:">
            <el-col :span="11" style="width: 240px">
              <el-date-picker v-model="form2.dateEgresos" type="date" placeholder="Fecha del ingreso:"
                format="DD/MM/YYYY" value-format="DD-MM-YYYY" />
            </el-col>
          </el-form-item>
          <el-form-item prop="descriptionEgresos" label="Descripcion:" style="width: 240px;">
            <el-input v-model="form2.descriptionEgresos" type="textarea" class="px-1"
              placeholder="Ingresa la descripcion:" maxlength="100" show-word-limit />
          </el-form-item>
          <el-form-item prop="montoEgresos" label="Monto:" style="width: 240px;">
            <el-input v-model="form2.montoEgresos" class="px-1" placeholder="Ingresa el monto:" type="number" />
          </el-form-item>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="dialogVisibleCreate1 = false">Cancelar</el-button>
          <el-button type="primary" @click="createEgreso">Crear</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 2 -->

  </div>





</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';

export default {
  name: 'AdminGastosComponent',
  data: () => ({
    dialogVisible: false,
    dialogVisibleView: false,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    dialogVisibleCreate: false,
    dialogVisibleCreate1: false,
    isHovered: false,
    tableData1: [],
    tableData2: [],
    tableData3: [],
    filteredData1: [],
    filteredData2: [],
    filteredData3: [],
    selectedItem: null,
    totalIngresos: 0,
    totalEgresos: 0,
    totalSaldo: 0,
    totalBancoIngreso: 0,
    totalBancoEgreso: 0,
    totalSaldoBanco: 0,
    totalCajaEgreso: 0,
    totalCajaBanco: 0,
    selectedDate: null,
    selectedDate1: null,
    searchQuery1: '',
    searchQuery2: '',
    searchQuery3: '',
    departamentos:[],
    form1: {
      dateIngreso: '',
      descriptionIngreso: '',
      montoIngreso: '',
      dataIngreso: '',
      id_departamento1: '',
    },
    rules: {
      dateIngreso: [
        { required: true, message: 'La fecha es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      descriptionIngreso: [
        { required: true, message: 'La descripcion es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      montoIngreso: [
        { required: true, message: 'El monto es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      dataIngreso: [
        { required: true, message: 'El campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    },
    form2: {
      dateEgresos: '',
      descriptionEgresos: '',
      montoEgresos: '',
      dataEgresos: '',
    },
    rules2: {
      dateEgresos: [
        { required: true, message: 'La fecha es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      descriptionEgresos: [
        { required: true, message: 'La descripcion es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      montoEgresos: [
        { required: true, message: 'El monto es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      dataEgresos: [
        { required: true, message: 'El monto es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    }
  }),
  mounted() {
    this.refresh(),
    this.fetchData();
    this.fetchDepartamento();
  },
  methods: {
    refresh() {
      axios.get('ingresos')
        .then(res => {
          this.tableData1 = res.data.data;
          this.filteredData1 = this.tableData1;
        });

      axios.get('egresos')
        .then(res => {
          this.tableData2 = res.data.data;
          this.filteredData2 = this.tableData2;
        });

      axios.get('completarOrden')
        .then(res => {
          this.tableData3 = res.data.data;
          this.tableData3 = res.data.data.filter(row => row.requiere3 == 'Pagado/Efectivo' || row.requiere3 == 'Pagado/Banco');
          this.filteredData3 = this.tableData3;
        });
    },

    handleHover(event) {
      this.isHovered = event.type === 'mouseover';
    },

    handleEdit() {
    },

    handleDelete() {
      axios.delete('clientes/' + this.selectedItem.id).then(res => {
        console.log(res)
        this.refresh()
        this.dialogVisible = false
      })
    },

    eliminar(row) {
      console.log(row)
      this.selectedItem = row
      this.dialogVisible = true
    },

    seleccionar(row) {
      console.log(row)
      this.selectedItem = row
      this.dialogVisibleView = true
    },

    pdf(row) {
      console.log(row)
      this.selectedItem = row
    },

    async fetchData() {
      try {
        const responseTotalDinero = await axios.get(this.urlApi + 'totalCaja');
        const {
          totalIngresos,
          totalBancoIngreso,
          totalEgresos,
          totalBancoEgreso,
          totalSaldo,
          totalSaldoBanco,
          totalCajaBanco,
          totalCajaEgreso,
        } = responseTotalDinero.data; // Destructuring assignment

        this.totalIngresos = totalIngresos;
        this.totalBancoIngreso = totalBancoIngreso;
        this.totalEgresos = totalEgresos;
        this.totalBancoEgreso = totalBancoEgreso;
        this.totalSaldo = totalSaldo;
        this.totalSaldoBanco = totalSaldoBanco;
        this.totalCajaBanco = totalCajaBanco;
        this.totalCajaEgreso = totalCajaEgreso;

        console.log('Total Ingresos', this.totalIngresos);
        console.log('Total Ingresos Banco', this.totalBancoIngreso);
        console.log('Total Egresos', this.totalEgresos);
        console.log('Total Egresos Banco', this.totalBancoEgreso);
        console.log('Total Caja', this.totalSaldo);
        console.log('Total Banco', this.totalSaldoBanco);
        console.log('Total Caja Banco', this.totalCajaBanco);
        console.log('Total Caja Egresos', this.totalCajaEgreso);
        console.log('Totales', responseTotalDinero.data);
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
    },

    createIngreso() {
      this.$refs.formRef.validate((valid) => {
        if (valid) {
          axios.post('ingresos', this.form1)
            .then(res => {
              console.log(res);
              this.dialogVisibleCreate = false;
              this.refresh(); // Call fetchData here
              this.fetchData();
              this.$message.success('Ingreso insertado exitosamente');
              ElNotification({
                title: 'Alerta',
                message: 'Registro insertado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.log(error);
              this.$message.error('Error al insertar el ingreso');
              ElNotification({
                title: 'Error',
                message: 'Favor de llenar los campos',
                type: 'error'
              })
            });
        } else {
          console.log('Validation failed');
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          });
          return false;
        }
      });
    },

    createEgreso() {
      this.$refs.formRef.validate((valid) => {
        if (valid) {
          axios.post('egresos', this.form2)
            .then(res => {
              console.log(res);
              this.dialogVisibleCreate1 = false;
              this.refresh(); // Call fetchData here
              this.fetchData();
              this.$message.success('Egreso insertado exitosamente');
              ElNotification({
                title: 'Alerta',
                message: 'Registro insertado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.log(error);
              this.$message.error('Error al insertar el egreso');
              ElNotification({
                title: 'Error',
                message: 'Favor de llenar los campos',
                type: 'error'
              })
            });
        } else {
          console.log('Validation failed');
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          });
          return false;
        }
      });
    },
    parseDate(fecha) {
      var f1 = fecha.split("-")[2]
      f1 += "-" + fecha.split("-")[1]
      f1 += "-" + fecha.split("-")[0]
      return new Date(f1)
    },
    filterDate1() {
      if (this.selectedDate && this.selectedDate1) {
        // Convert dates to Date objects and handle null values
        const startDate = this.selectedDate;
        const endDate = this.selectedDate1;
        var f1 = this.parseDate(startDate)
        var f2 = this.parseDate(endDate)

        // Ensure startDate is less than or equal to endDate
        if (f1 > f2) {
          ElNotification({
            title: 'Error',
            message: 'La fecha de inicio debe ser anterior a la fecha final.',
            type: 'error'
          });
          return;
        }

        this.filteredData1 = this.tableData1.filter(ingresos => {
          const ingresoDate = this.parseDate(ingresos.dateIngreso);
          return ingresoDate >= f1 && ingresoDate <= f2;
        });
        // this.filteredData1 = this.tableData1.filter(ingresos =>f1 >= this.parseDate(ingresos.dateIngreso) && this.parseDate(ingresos.dateIngreso) <= f2)
        /*this.filteredData1 =[]
        for(var i=0;i<this.tableData1.length;i++){
           const ingresoDate = this.parseDate(this.tableData1[i].dateIngreso);
           if(ingresoDate >= f1 && ingresoDate<=f2){
             this.filteredData1.push(this.tableData1[i])
             console.log("ENTRO",ingresoDate, f1,f2)
           }
           console.log("ENTRO",ingresoDate, f1,f2, ingresoDate >= f1, ingresoDate<=f2)
           
         }*/

        this.filteredData2 = this.tableData2.filter(egresos => {
          const egresoDate = this.parseDate(egresos.dateEgresos);
          return egresoDate >= f1 && egresoDate <= f2;
        });

        this.filteredData3 = this.tableData3.filter(completarOrden => {
          const completarOrdenDate = this.parseDate(completarOrden.date1);
          return completarOrdenDate >= f1 && completarOrdenDate <= f2;
        });

        // Show notification based on filtered data count
        if (this.filteredData1.length === 0 && this.filteredData2.length === 0 && this.filteredData3.length === 0) {
          ElNotification({
            title: 'Aviso',
            message: `No se encontraron datos para el rango de fechas seleccionado (${this.selectedDate} - ${this.selectedDate1}).`,
            type: 'warning'
          });
        } else {
          ElNotification({
            title: 'Datos encontrados',
            message: `Se encontraron datos para el rango de fechas seleccionado (${this.selectedDate} - ${this.selectedDate1}).`,
            type: 'success'
          });
        }
      } else {
        // If no dates are selected or only one is selected, show all data
        this.filteredData1 = this.tableData1;
        this.filteredData2 = this.tableData2;
        this.filteredData3 = this.tableData3;
        ElNotification({
          title: 'Mostrando todos los datos',
          message: 'Se están mostrando todos los datos de la agenda.',
          type: 'info'
        });
      }
    },


    filterData1() {
      this.filteredData1 = this.tableData1.filter((ingresos) => {
        return ingresos.descriptionIngreso.toLowerCase().includes(this.searchQuery1.toLowerCase());
      });
      this.filteredData2 = this.tableData2.filter((egresos) => {
        return egresos.descriptionEgresos.toLowerCase().includes(this.searchQuery1.toLowerCase());
      });
    },

    filterData2() {
      this.filteredData1 = this.tableData1.filter((ingresos) => {
        return ingresos.montoIngreso.toLowerCase().includes(this.searchQuery2.toLowerCase());
      });
      this.filteredData2 = this.tableData2.filter((egresos) => {
        return egresos.montoEgresos.toLowerCase().includes(this.searchQuery2.toLowerCase());
      });
      this.filteredData3 = this.tableData3.filter((completarOrden) => {
        return completarOrden.pago.toLowerCase().includes(this.searchQuery2.toLowerCase());
      });
    },

    filterData3() {
      this.filteredData1 = this.tableData1.filter((ingresos) => {
        return ingresos.dataIngreso.toLowerCase().includes(this.searchQuery3.toLowerCase());
      });
      this.filteredData2 = this.tableData2.filter((egresos) => {
        return egresos.dataEgresos.toLowerCase().includes(this.searchQuery3.toLowerCase());
      });
    },

    formatNumber(row, property) {
      const value = row[property];
      const parts = value.toString().split('.');
      const integerPart = parts[0];
      const decimalPart = parts[1] || '00';
      const formattedInteger = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      return formattedInteger + '.' + decimalPart;
    },

    fetchDepartamento() {
      axios.get('verDepartamento')
        .then(response => {
          console.log('Departamento:', response.data);
          this.departamentos = response.data; // Assuming the data structure is correct
        })
        .catch(error => {
          console.error('Error fetching departamento:', error);
          ElNotification({
            title: 'Error',
            message: 'Error al recuperar departamento',
            type: 'error',
          });
        });
    },

  }
}
</script>

<style>
.txtH1 {
  text-align: center;
  font-weight: bold;
  margin-bottom: 2%;

}

.txtH3 {
  font-weight: 900;

}

h2 {
  margin-top: 5%;
  text-align: center;
  font-weight: 500;
}

.box-item {
  position: absolute;
  text-align: center;
  justify-content: center;
  align-items: center;
}

.centerFiltros {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.table-container {
  overflow-x: auto;
}

.btnPdf {
  border: 1px solid rgb(0, 0, 0, 0.20);
  box-shadow: 2px 2px 2px rgb(0, 0, 0, 0.60);
  background-color: white;
  color: red;
  transition: 1s ease-in-out;

}

.btnPdf:hover {
  background-color: red;
  color: white;
  transition: 1s ease-in-out;
}
</style>