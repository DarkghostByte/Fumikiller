<template>
    <div>
        <div class="flex justify-center items-center h-screen bg-gradient-to-r from-orange-500 from-25% to-blue-800 to-60%">
            <div class="flex" style="width:60%; height: 80%;">
                <div class="contenedor1 flex justify-center items-center">
                    <img v-bind:src="url+'img/logofk.png'" class="imgFk">               
                </div>
                <div class="contenedor2 row justify-center items-center">
                    <div>
                        <h1 class="text-center text-8xl font-bold py-10 text-[#000000]">FUMI-KILLE'R</h1>
                    </div>
                    <div class="flex justify-center items-center">
                        <router-link to="/admin/home">
                            <button class="btnInicio">
                                Inicio
                            </button>
                        </router-link>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--
    
    <div class="flex justify-center items-center h-screen bg-gradient-to-r from-orange-500 from-25% to-blue-800 to-60%">
        <div class="w-1/2">
            <div class="DivAzul">
                <img v-bind:src="url+'img/logofk.png'" class="imgFk">               
                <div class="DivNaranja">
                    <h1 style="margin-top:25%;font-size: 60px; ">FUMI-KILLE'R</h1>
                    
                    <router-link to="/admin/home">
                        <button class="btnInicio">
                            Inicio
                        </button>
                    </router-link>

                    
                    
                </div>
            </div>   
            
            
        </div>
    </div>






    <div class="w-10 h-10" style="background-color: black;">

        <div class="DivAzul">
            <div class="DivNaranja">
                <h1 style="margin-top:15%;font-size: 60px; ">FUMI-KILLE'R</h1>
                <button class="btnInicio">INICIO</button>
            </div>
        </div>   
        
    </div>
-->
</template>

<style>

.btnInicio {
    margin-top: 10%;
    background-color: black;
    border-radius: 50px;
    width: 270px;
    height: 90px;
    color: aliceblue;
    font-size: 40px;
    text-align: center;
    border: none;
    transition: .5s;
}

.btnInicio:hover {
    align-items: center;
    transform: scale(1.1);
    text-align: center;
    height: 95px;
    width: 280px;
    border: 1px solid black; 
    /*background: linear-gradient(to right, white, black);*/
    color: white;
    font-weight: bolder; 
}





.contenedor1 {
    background-color: #1e40af;
    width: 45%;
    height: 100%;
    border-radius: 25px 0% 0% 25px;
}

.contenedor2 {
    background-color: #f97316;
    width: 55%;
    height: 100%;
    border-radius: 0% 25px 25px 0%;
}

.imgFk {
    width: 20%;
    height: 70%;
    position: absolute;
}

h1:hover {
    transform: scale(1.1);
    text-align: center;
  }

</style>

<script>
export default {
    name: 'LoginComponent',
    data: () => ({
        url: process.env.VUE_APP_ROOT_ASSETS,
    }),
}

</script>
