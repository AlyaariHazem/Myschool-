<div id="addteacher" class="modal">
    <form class="modal-content animate create_form" action="" method="POST"
        style="width:70%;background-color:rgb(222, 217, 237);">
        <div class="imgcontainer">
            <span onclick="document.getElementById('addteacher').style.display='none'" class="close"
                title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">الرقــم</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="teacher_id" value="<?php echo $teacher_id;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">الاسم</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="teacher_name" value="<?php echo $teacher_name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">رقم الهــاتف </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="teacher_phone" value="<?php echo $teacher_phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">الراتب</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="teacher_salary" value="<?php echo $teacher_salary;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">الجنس</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="teacher_sex" value="<?php echo $teacher_sex;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">اسم المادة</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="subject_name" value="<?php echo $subject_name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">رقم المدير</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="teacher_mang_id"
                        value="<?php echo $teacher_mang_id;?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-1">
                    <button type="submit" class="btn btn-primary create_submit " name="send">إضـــافــة</button>
                </div>
            </div>

            <div class="col-sm-3 d-grid">
                <a class="btn btn-danger btns " role="bottun" href="subjects.php">إلـغــاء</a>
            </div>
        </div>
    </form>
</div>
