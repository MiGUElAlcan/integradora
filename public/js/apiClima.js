const apiKey = "f04fdd3ecebde616e825c24d0387e24c",
url = `https://api.openweathermap.org/data/2.5/weather?q=Tecamachalco&appid=${apiKey}&units=metric`,
$humedad= document.getElementById("id-humedad"),
$indHumedad = document.getElementById("cicle-humedad"), 
$temExterior = document.getElementById("id-t-exterior"),
$indTemExterior = document.getElementById("cicle-t-exterior");

const apiClima = ()=>{
    fetch(url)
    .then(response => response.json())
    .then(data => {
        const main = data.main;
        /* console.log(main); */
        $humedad.innerHTML = `${main.humidity}<span>%</span>`;
        $indHumedad.style.strokeDashoffset = (440 - (440 * main.humidity) / 100);
        
        $temExterior.innerHTML = `${Math.round(main.temp)}<span>ºC</span>`;
        $indTemExterior.style.strokeDashoffset = (440 - (440 * main.temp) / 60);
        
    })
    .catch(() => {
      msg.textContent = "No podemos mostrarte la temperatura y humedad actual ";
    });
};


document.addEventListener("DOMContentLoaded",(e)=>{
    apiClima();
});