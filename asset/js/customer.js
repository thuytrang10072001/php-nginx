$(document).ready(() => {
   $('.btn-detail').on('click', function(event){
      const customerId = this.getAttribute('data-id');
      window.location.href = '/customer/' + customerId;   })
}) 