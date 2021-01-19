let totalquestions = 1;

/**
 * addQuestion
 * @return void
 */
let addQuestion = () => {
    totalquestions += 1;
    let quediv = document.createElement('div');
    quediv.id = `jobquestion${totalquestions}`;
    quediv.className = 'mt-2 c-qinput-fade-in';
    quediv.innerHTML = `
            <label class="c-form-label" for="jobq${totalquestions}">Vraag ${totalquestions}</label>
            <div class="input-group mb-3">
                <input class="form-control" id="jobq${totalquestions}" type="text" name="jobq${totalquestions}" required autofocus>
            </div>
    `;
    document.getElementById('jobquestions').appendChild(quediv);
}

/**
 * removeQuestion
 * @return void
 */
let removeQuestion = () => {
    if (totalquestions < 1) return;
    document.getElementById('jobquestions').removeChild(document.getElementById(`jobquestion${totalquestions}`));
    totalquestions -= 1;
}
