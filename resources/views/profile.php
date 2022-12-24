

<div class="d-flex flex-column justify-content-center align-items-center my-5">
    <div class="w-50 mb-4 px-3 d-flex justify-content-end align-items-center">
        <button id="back" class="btn btn-danger d-none">Back</button>
        <button id="next" class="btn btn-success">Next</button>
    </div>

    <!--<form class="w-50" action="./process_cv_submission.php" method="POST" enctype="multipart/form-data">-->

    <form class="w-50" action="./process_cv_submission.php" method="POST" enctype="multipart/form-data">

        <div class="cv-info-1">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">DOB</label>
                <input type="text" class="form-control" id="dob" name="dob">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>

        <div class="cv-info-2">
            <div class="mb-3">
                <label for="objective" class="form-label">Objective</label>
                <textarea class="form-control" id="objective" name="objective" rows="15"></textarea>
            </div>
        </div>

        <div class="cv-info-3">
            <h3 class="form-label">Education</h3>
            <div id="education-section">
                <div class="mb-3">
                    <label for="institute-1" class="form-label">Institute</label>
                    <input type="text" class="form-control" id="institute-1" name="institute[]">
                </div>
                <div class="mb-3">
                    <label for="gdate-1" class="form-label">Graduation Date</label>
                    <input type="date" class="form-control" id="gdate-1" name="gdate[]">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button id="eduBtn" class="btn btn-primary">Add Education</button>
            </div>
        </div>

        <div class="cv-info-4">
            <h3 class="form-label">Working Experience</h3>
            <div id="working-experience-section">
                <div class="mb-3">
                    <label for="company-1" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company-1" name="company[]">
                </div>
                <div class="mb-3">
                    <label for="sdate-1" class="form-label">Starting Date</label>
                    <input type="date" class="form-control" id="sdate-1" name="sdate[]">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button id="workingBtn" class="btn btn-primary">Add Working Experience</button>
            </div>
        </div>

        <div class="cv-info-5">
            <h3 class="form-label">Photo</h3>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>

$(function () {
    const next = $('#next');
    const back = $('#back');

    const eduBtn = $('#eduBtn');
    const workingBtn = $('#workingBtn');

    let currentDiv = 1;
    let eduCounter = 1;
    let workingCounter = 1;

    next.click(function (e) {
        e.preventDefault();

        if (currentDiv == 1) {
            back.removeClass('d-none');
            back.parent().removeClass('justify-content-end');
            back.parent().addClass('justify-content-between');
        } else if (currentDiv == 4) {
            next.text('Submit');
        } else if (currentDiv == 5) {
            $('form').submit();
        }

        $(`.cv-info-${currentDiv} *`).hide('slow');
        $(`.cv-info-${currentDiv}`).animate({
            width: 0,
            opacity: 0
        }, 1000, function () {
            $(`.cv-info-${currentDiv++}`).hide();
            $(`.cv-info-${currentDiv}`).show();
            $(`.cv-info-${currentDiv}`).animate({
                width: '100%',
                opacity: 1
            }, 1000);
        });
    });

    back.click(function (e) {
        e.preventDefault();

        if (currentDiv == 2) {
            back.addClass('d-none');
            back.parent().addClass('justify-content-end');
            back.parent().removeClass('justify-content-between');
        } else if (currentDiv == 5) {
            next.removeClass('d-none');
            next.text('Next');
        }

        $(`.cv-info-${currentDiv}`).animate({
            width: 0,
            opacity: 0
        }, 1000, function () {
            $(`.cv-info-${currentDiv--}`).hide();
            $(`.cv-info-${currentDiv} *`).show();
            $(`.cv-info-${currentDiv}`).show();
            $(`.cv-info-${currentDiv}`).animate({
                width: '100%',
                opacity: 1
            }, 1000);
        });
    });

    eduBtn.click(function (e) {
        e.preventDefault();
        eduCounter++;
        // if (eduCounter > 5) {
        //     return;
        // }
        $('#education-section').append(`
            <div class="mb-3">
                <label for="institute-${eduCounter}" class="form-label">Institute</label>
                <input type="text" class="form-control" id="institute-${eduCounter}" name="institute[]">
            </div>
            <div class="mb-3">
                <label for="gdate-${eduCounter}" class="form-label">Graduation Date</label>
                <input type="date" class="form-control" id="gdate-${eduCounter}" name="gdate[]">
            </div>
        `);
    });

    workingBtn.click(function (e) {
        e.preventDefault();
        workingCounter++;
        // if (workingCounter > 5) {
        //     return;
        // }
        $('#working-experience-section').append(`
            <div class="mb-3">
                <label for="company-${workingCounter}" class="form-label">Company</label>
                <input type="text" class="form-control" id="company-${workingCounter}" name="company[]">
            </div>
            <div class="mb-3">
                <label for="sdate-${workingCounter}" class="form-label">Starting Date</label>
                <input type="date" class="form-control" id="sdate-${workingCounter}" name="sdate[]">
            </div>
        `);
    });
});

</script>