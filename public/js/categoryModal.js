$('#viewCategory').on('show.bs.modal', function (event) {
    // console.log('The delete button has been clicked.')
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') 
    var description = button.data('description')
    var date = button.data('date')
    var modal = $(this)
    
    modal.find('.modal-body #name').text(name)
    modal.find('.modal-body #description').text(description)
    modal.find('.modal-body #date').text(date)
    
  })
  $('#deleteCategory').on('show.bs.modal', function (event) {
    // console.log('The delete button has been clicked.')
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') 
    var id = button.data('id')
    // var date = button.data('date')
    var modal = $(this)
    
    modal.find('.modal-title').text( 'Are You Sure You Want To Delete Category:  ' + name)
    modal.find('.modal-body #name').text(name)
    modal.find('.modal-body #id').val(id)
  })

  $('#editCategory').on('show.bs.modal', function (event) {
    // console.log('The delete button has been clicked.')
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') 
    var id = button.data('id')
    var description = button.data('description')
    // var date = button.data('date')
    var modal = $(this)
    
    modal.find('.modal-title').text( 'Edit Category:  ' + name)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #description').val(description)
    modal.find('.modal-body #id').val(id)
  })
  