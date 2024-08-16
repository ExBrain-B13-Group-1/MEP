$(document).ready(function () {

    let settingurl = `http://localhost/MEP/Institute/Controller/GetProfileSettingDataController.php`;
    let updateUrl = `http://localhost/MEP/Institute/Controller/UpdateSettingController.php`;
    let sociallinkurl = `http://localhost/MEP/Institute/Controller/GetSocialLinksController.php`;
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
                console.log(datas);
                currentphoto = datas.photo;
                let displaydata = `
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold dark:text-white mb-5 opacity-80">Institute Information</h2>
                    </div>
                    <form action="http://localhost/MEP/Institute/Controller/UpdateSettingController.php" method="POST" enctype="multipart/form-data">
                        <div class="grid grid-cols-2 gap-20">
                            <!-- left -->
                            <div>
                                <p class="opacity-70 text-xl dark:text-white dark:opacity-80 mb-2 font-medium">Current Photo</p>
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file1" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700  dark:border-gray-600 ">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img src="${baseurl + datas.photo}" class="h-64" alt="">
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
                            <input type="submit" name="submit" value="Save Change" id="savechange" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-6 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" />
                        </div>
                    </form>
                    `;

                $('#generalsetting').append(displaydata);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }

        });

        // let uploadphoto = "";

        // $('#changephoto').change(function (e) {
        //     console.log('hay');
        //     let changephoto = e.target.files[0];
        //     uploadphoto = changephoto.name;
        // })


        // $('#savechange').on('click', function (e) {
        //     e.preventDefault();

        //     console.log('Button clicked');
        //     let photo = uploadphoto === "" ? currentphoto : uploadphoto;
        //     let instituteName = $('#institute_name').val();
        //     let email = $('#email').val();
        //     let phone = $('#phone').val();
        //     let website = $('#website').val();
        //     let address = $('#address').val();

        //     console.log('Variables:', { photo, instituteName, email, phone, website, address });

        //     $.ajax({
        //         url: updateUrl,
        //         method: 'POST',
        //         data: {
        //             photo: photo,
        //             institute_name: instituteName,
        //             email: email,
        //             phone: phone,
        //             website: website,
        //             address: address
        //         },
        //         dataType: 'json', // Expect JSON response
        //         success: function (data) {
        //             console.log('Data updated successfully:', data);
        //         },
        //         error: function (xhr, status, error) {
        //             console.error('Error updating data:', status, error);
        //             console.log('Raw Response:', xhr.responseText); // Inspect raw response
        //         }
        //     });

        // });


    }

    fetchData();



});

