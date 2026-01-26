let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide(i){
    slides.forEach(slide => slide.classList.remove("active"));
    slides[i].classList.add("active");
}

function nextSlide(){
    if(index < slides.length -1){
        index++;
    }else{
        index = 0;
    }
    showSlide(index);
}

function prevSlide() {
    if(index > 0){
        index--;
    }else{
        index = slides.length -1;
    }
    showSlide(index);
}