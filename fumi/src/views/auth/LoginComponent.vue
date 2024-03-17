<template>
    
    <div class="flex justify-center items-center h-screen bg-neutral-950">
        <div class="w-1/2">
            <div class="DivAzul">
                <img v-bind:src="url+'img/logofk.png'" class="imgFk">               
                <div class="DivNaranja">
                    <h1 style="margin-top:25%;font-size: 60px; ">FUMI-KILLE'R</h1>
                    <button class="btnInicio">INICIO</button>
                </div>
            </div>   
            
            
        </div>
    </div>




<!--

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
.DivAzul{
    justify-content: center;
    margin-left: -10%; 
    margin-top: 2%; 
    border-radius: 25px;
    width: 100%; height:90vh; 
    background-color:#0F0F88; 
}
.DivNaranja{
    position:absolute; 
    text-align: center; 
    margin-left: 20%;  
    border-radius: 25px; 
    width: 40%; height:90vh; 
    background-color:#FD5902; 

}
.btnInicio{
    margin-top: 10%;
    background-color: black; 
    border-radius: 45px; 
    width:220px; 
    height:75px; 
    color:aliceblue; 
    font-size:40px; 
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    border: none;    
    transition: 2s;
}
.btnInicio:hover{
    background-color:#0F0F88;
    align-items: center;
    transform: scale(1.1);
    text-align: center;
    height: 85px;
    width: 245px;
    border: 1px,solid,black;
}
.imgFk{
    width:280px; 
    height:470px; 
    position:absolute;
    margin-top: 5%;
    margin-left: .7%;
}
</style>

<script>
    export default{
        name:'LoginComponent',
        data:()=>({
            url:process.env.VUE_APP_ROOT_ASSETS,
        }),
    }
        
</script>
