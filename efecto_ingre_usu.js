var inputs = document.getElementsByClassName('cajapeque');
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('keyup', function() {
    if(this.value.length>=1){
      this.nextElementSibling.classList.add('fijar');
    }else {
      this.nextElementSibling.classList.remove('fijar');
    }
  })
}

var inputs2 = document.getElementsByClassName('cajapequec');
for (var i = 0; i < inputs.length; i++) {
  inputs2[i].addEventListener('keyup', function() {
    if(this.value.length>=1){
      this.nextElementSibling.classList.add('fijar');
    }else {
      this.nextElementSibling.classList.remove('fijar');
    }
  })
}
