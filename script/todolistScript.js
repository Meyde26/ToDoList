const newTask = document.querySelector('#new-task');
const addTaskButton = document.querySelector('#add-task');
const taskList = document.querySelector('#task-list');

// Ajouter une nouvelle tâche
addTaskButton.addEventListener('click', function(event) {
	event.preventDefault();
	const taskText = newTask.value;
	if (taskText !== '') {
		const newTaskItem = document.createElement('li');
		newTaskItem.innerHTML = `<input type="checkbox"><span class="task-text">${taskText}</span><button class="delete">Supprimer</button><button class="edit">Modifier</button>`;
		taskList.appendChild(newTaskItem);
		newTask.value = '';
	}
});

// Supprimer une tâche
taskList.addEventListener('click', function(event) {
	if (event.target.classList.contains('delete')) {
		event.target.parentElement.remove();
	}
});

// Modifier une tâche
taskList.addEventListener('click', function(event) {
	if (event.target.classList.contains('edit')) {
		const taskTextElement = event.target.previousSibling.previousSibling;
		const currentTaskText = taskTextElement.textContent;
		const newTaskText = prompt('Modifier la tâche:', currentTaskText);
		if (newTaskText !== null && newTaskText !== '') {
			taskTextElement.textContent = newTaskText;
		}
	}
});

// Marquer une tâche comme terminée
taskList.addEventListener('change', function(event) {
	if (event.target.type === 'checkbox') {
		const taskTextElement = event.target.nextSibling;
		if (event.target.checked) {
			taskTextElement.style.textDecoration = 'line-through';
			taskTextElement.style.color = '#999';
		} else {
			taskTextElement.style.textDecoration = 'none';
			taskTextElement.style.color = '#000';
		}
	}
});
