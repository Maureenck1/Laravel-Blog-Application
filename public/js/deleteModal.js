// When the button delete is clicked.
  $('#delete').on('show.bs.modal', function (event) {
    console.log('The delete button has been clicked.')
    var button = $(event.relatedTarget) // Button that triggered the modal
    var title = button.data('title') 
    var id = button.data('id')
    var modal = $(this)
    
    modal.find('.modal-body #hidden').val(id)
    modal.find('.modal-body #title').val(title)
    
  })