$(document).ready(function () {

    let settingurl = `http://localhost/MEP/Institute/Controller/GetProfileSettingDataController.php`;
    let updateUrl = `http://localhost/MEP/Institute/Controller/UpdateSettingController.php`;

    let updatepasswordurl = `http://localhost/MEP/Institute/Controller/UpdatePasswordController.php`;

    let getsociallinkurl = `http://localhost/MEP/Institute/Controller/GetSocialLinksController.php`;
    let sociallinkurl = `http://localhost/MEP/Institute/Controller/UpdateSocialLinkController.php`;
    let baseurl = `../../../../storages/uploads/`;

    $('.modechanges').on("click", () => {
        updateChartColors();
    });

    $('.changes').on('click', function () {
        $('.changes').removeClass("actives");
        $(this).addClass('actives');
        console.log($(this).text());

        const sections = {
            "General": ".generals",
            "Account & Security": ".accsecuritys",
            "Social Link": ".sociallinks"
        };

        const selectedText = $(this).text();

        Object.keys(sections).forEach(key => {
            const section = sections[key];
            if (key === selectedText) {
                $(section).removeClass('hidden').addClass('block');
            } else {
                $(section).removeClass('block').addClass('hidden');
                $('.generaledits').removeClass("block").addClass("hidden");
            }
        });
    });

    function togglePasswordVisibility(toggleId, inputId) {
        $(`#${toggleId}`).on('click', function () {
            const passwordField = $(`#${inputId}`);
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            const iconName = type === 'password' ? 'eye-off-outline' : 'eye-outline';
            $(this).attr('name', iconName);
        });
    }

    togglePasswordVisibility('toggle-password-cur', 'cur-password');
    togglePasswordVisibility('toggle-password-new', 'new-password');
    togglePasswordVisibility('toggle-password-confirm', 'confirm-password');

    let currentphoto = "";

    async function fetchData() {
        await $.ajax({
            url: settingurl,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let datas = data[0];
                // console.log(datas);
                currentphoto = datas.photo;
                let displaydata = `
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold dark:text-white mb-5 opacity-80">Institute Information</h2>
                    </div>
                    <form >
                        <div class="grid grid-cols-2 gap-20">
                            <!-- left -->
                            <div>
                                <p class="opacity-70 text-xl dark:text-white dark:opacity-80 mb-2 font-medium">Current Photo</p>
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file1" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700  dark:border-gray-600 ">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img id="currentphoto" src="${baseurl + datas.photo}" class="h-64" alt="">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <!-- right -->
                            <div>
                                <p class="opacity-70 text-xl dark:text-white dark:opacity-80 mb-2 font-medium">Change Photo</p>
                                <div class="flex items-center justify-center w-full">
                                    <label for="changephoto" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img id="preview_image" src="" alt="Class Profile Photo" class="h-64 hidden" />
                                            <div id="showtext" class="block">
                                                <div class="flex justify-center">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                </div>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            </div>
                                        </div>
                                        
                                        <input id="changephoto" class="hidden" name="image" aria-describedby="user_avatar_help" id="edit-profile" type="file" name="image" accept=".jpg, .jpeg" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0]);document.getElementById('preview_image').classList.remove('hidden');document.getElementById('showtext').classList.add('hidden')"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-20">
                            <div class="mb-6 mt-8">
                                <label for="institute_name" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Institute Name</label>
                                <input type="text" id="institute_name" name="institutename" value="${datas.name}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold dark:text-white mb-5 mt-6 opacity-80">Institute Information</h2>
                        <div class="grid grid-cols-2 gap-20">
                            <div>
                                <div class="mb-6 mt-0">
                                    <label for="email" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Email</label>
                                    <input type="email" id="email" name="email" value="${datas.email}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-6 mt-0">
                                    <label for="phone" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Phone</label>
                                    <input type="text" id="phone" name="phone" value="${datas.contact}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                            <div>
                                <div class="mb-6 mt-0">
                                    <label for="website" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Website</label>
                                    <input type="text" id="website" name="website" value="${datas.website}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-6 mt-0">
                                    <label for="address" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Address</label>
                                    <input type="text" id="address" name="address" value="${datas.address}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-5">
                            <input type="button" name="button" value="Save Change" id="savechange" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-6 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" />
                        </div>
                    </form>
                    `;

                $('#generalsetting').append(displaydata);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }

        });

        let uploadphoto = "";

        $('#changephoto').change(function (e) {
            console.log('hay');
            let changephoto = e.target.files[0];
            uploadphoto = changephoto.name;
        })


        $('#savechange').on('click', function (e) {
            e.preventDefault();

            let photo = uploadphoto === "" ? currentphoto : uploadphoto;
            let instituteName = $('#institute_name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let website = $('#website').val();
            let address = $('#address').val();

            let formData = new FormData();
            formData.append('photo', $('#changephoto')[0].files[0]);
            formData.append('institute_name', instituteName);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('website', website);
            formData.append('address', address);

            console.log(formData);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", updateUrl, true);
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4) {
                    if (xmlhttp.status === 200) {
                        // console.log(xmlhttp.responseText);
                        var response = JSON.parse(xmlhttp.responseText);
                        console.log(response);
                        if(response.success){
                            $('#preview_image').attr('src','');
                            $('#showtext').removeClass('hidden').addClass('block');
                            $('#preview_image').removeClass('block').addClass('hidden');
                            $('#currentphoto').attr('src',`${baseurl + response.photo}`);
                            $('#institute-profile').attr('src',`${baseurl + response.photo}`);
                            $('#institute-name').text(response.institute_name);
                            $('#email').val(response.email);
                            $('#phone').val(response.phone);
                            $('#website').val(response.website);
                            $('#address').val(response.address);

                            Swal.fire({
                                title: "Success",
                                text: "Update Successfully!",
                                icon: "success",
                                timer: 2000,
                                timerProgressBar: true,
                                toast: true,
                                position: "top",
                                showConfirmButton: false,
                            });
                            // window.location.reload();
                        }
                        
                    } else {
                        console.error('Error uploading data:', xmlhttp.statusText);
                        try {
                            let response = JSON.parse(xmlhttp.responseText);
                            Swal.fire({
                                title: "Error",
                                text: response.message || "Failed to update settings",
                                icon: "error"
                            });
                        } catch (e) {
                            Swal.fire({
                                title: "Error",
                                text: "Failed to update settings",
                                icon: "error"
                            });
                        }
                    }
                }
            };
            xmlhttp.send(formData);
        });
    }

    fetchData();

    async function showSocialLinks() {
        await $.ajax({
            url: getsociallinkurl,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                let displaydata = `
                    <div class="mb-6 mt-8">
                        <label for="facebook-link" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Facebook Link</label>
                        <input type="text" id="facebook-link" value="${data[0]['facebook_link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 mt-8">
                        <label for="telegram-link" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Telegram Link</label>
                        <input type="text" id="telegram-link" value="${data[0]['telegram_link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 mt-8">
                        <label for="instagram-link" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">Instagram Link</label>
                        <input type="text" id="instagram-link" value="${data[0]['instagram_link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 mt-8">
                        <label for="x-link" class="block mb-2 text-xl text-gray-900 dark:text-white opacity-70">X Link</label>
                        <input type="text" id="x-link" value="${data[0]['x_link']}" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                `;

                $('#sociallinks').append(displaydata);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    showSocialLinks();

    $('#updatesociallinks').on('click', function (e) {
        e.preventDefault();

        // console.log('hay');

        let facebooklink = $('#facebook-link').val();
        let telegramlink = $('#telegram-link').val();
        let instagramlink = $('#instagram-link').val();
        let xlink = $('#x-link').val();

        // console.log('Variables:', { facebooklink, telegramlink, instagramlink, xlink});
        let dataobj = { facebooklink: facebooklink, telegramlink: telegramlink, instagramlink: instagramlink, xlink: xlink };
        // console.log(dataobj);
        let datajsonobj = JSON.stringify(dataobj);
        console.log(datajsonobj);

        var xmlhttp = new XMLHttpRequest();
        var url = sociallinkurl;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("datas=" + datajsonobj);

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                var result = xmlhttp.responseText;
                // console.log(result);
                var resultobj = JSON.parse(result);
                console.log(resultobj);
                
                $('#facebook-link').val(`${resultobj.facebooklink}`);
                $('#telegram-link').val(`${resultobj.telegramlink}`);
                $('#instagram-link').val(`${resultobj.instagramlink}`);
                $('#x-link').val(`${resultobj.xlink}`);

                Swal.fire({
                    title: "Social Link Updated",
                    text: "Social Link Updated Successfully",
                    icon: "success",
                    timer: 3000,
                    timerProgressBar: true,
                    toast: true,
                    position: "top",
                    showConfirmButton: false,
                });
                // window.location.reload();
            }
        }
    });


    $('#save-password').on('click',function(e){
        e.preventDefault();
        // console.log('hay');

        let currentpassword = $('#cur-password').val();
        let newpassword = $('#new-password').val();
        let confirmpassword = $('#confirm-password').val();
        // console.log(currentpassword,newpassword,confirmpassword);

        if (!currentpassword || !newpassword || !confirmpassword) {
            Swal.fire({
                title: "Error",
                text: "All password fields must be filled out.",
                icon: "error"
            });
            return;
        }

        let dataobj = {currentpassword:currentpassword,newpassword:newpassword,confirmpassword:confirmpassword};
        let datajsonobj = JSON.stringify(dataobj);
        console.log(datajsonobj);

        var xmlhttp = new XMLHttpRequest();
        var url = updatepasswordurl;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("datas=" + datajsonobj);

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                var result = xmlhttp.responseText;
                console.log(result);
                var resultobj = JSON.parse(result);
                console.log(resultobj);
                if (resultobj['success']) {
                    $('#cur-password').val('');
                    $('#new-password').val('');
                    $('#confirm-password').val('');
                    Swal.fire({
                        title: "Success",
                        text: resultobj['message'],
                        icon: "success",
                        timer: 3000,
                        timerProgressBar: true,
                        toast: true,
                        position: "top",
                        showConfirmButton: false,
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: resultobj['message'],
                        icon: "error"
                    });
                }
            }
        }
    })


});

