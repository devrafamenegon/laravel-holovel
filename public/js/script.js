//variável que recebe o elemento html(Modal)
var confirmationModal = document.getElementById('confirmationModal');

//adiciona um evento, toda vez que o modal for aberto
confirmationModal.addEventListener('show.bs.modal', function (event) {

  //variável que recebe o botão que acionou o modal
  var button = event.relatedTarget

  //variável que recebe o formulário do modal
  var form = document.getElementById('formDeletePhoto')

  //Alterando o Action(rota) do formulário
  form.action = "/photos/"+button.getAttribute('data-photo-id')
})


function loadFile(event) {

  //variável que recebe o elemento img
  var photoPreview = document.getElementById('preview-img');

  var url = URL.createObjectURL(event.target.files[0]);

  photoPreview.src = url;
}
