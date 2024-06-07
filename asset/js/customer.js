$(document).ready(() => {
   $('.btn-detail').on('click', function(event){
      const customerId = this.getAttribute('data-id');
      window.location.href = '/customer/show/' + customerId;   
   })

   $('.btn-back').on('click', function(event){
      window.history.go(-1); 
   })
}) 