// name error
document.getElementById( 'inputName' ).oninput = function () {
  if ( this.value.length <= 3 ) {
    document.querySelector( '.nameError' ).classList.add( 'active' );
    this.parentElement.classList.add( 'notValid' );
    this.parentElement.classList.remove( 'valid' );
  } else {
    document.querySelector( '.nameError' ).classList.remove( 'active' );
    this.parentElement.classList.remove( 'notValid' );
    this.parentElement.classList.add( 'valid' );
  }
};


// email error
document.getElementById( 'emailInput' ).oninput = function () {
  let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!this.value.match(regexEmail)) {
    document.querySelector( '.emailError' ).classList.add( 'active' );
    this.parentElement.classList.add( 'notValid' );
    this.parentElement.classList.remove( 'valid' );
  } else {
    document.querySelector( '.emailError' ).classList.remove( 'active' );
    this.parentElement.classList.remove( 'notValid' );
    this.parentElement.classList.add( 'valid' );
  }
};


// number error
document.getElementById( 'phoneInput' ).oninput = function () {
  if (!(this.value.match(/^[0-9]+$/) != null))  {
    document.querySelector( '.phoneError' ).classList.add( 'active' );
    this.parentElement.classList.add( 'notValid' );
    this.parentElement.classList.remove( 'valid' );
  } else {
    document.querySelector( '.phoneError' ).classList.remove( 'active' );
    this.parentElement.classList.remove( 'notValid' );
    this.parentElement.classList.add( 'valid' );
  }
};

// message error
document.getElementById( 'messageInput' ).oninput = function () {
  if (this.value.length <= 10)  {
    document.querySelector( '.messageError' ).classList.add( 'active' );
    this.parentElement.classList.add( 'notValid' );
    this.parentElement.classList.remove( 'valid' );
  } else {
    document.querySelector( '.messageError' ).classList.remove( 'active' );
    this.parentElement.classList.remove( 'notValid' );
    this.parentElement.classList.add( 'valid' );
  }
};