const url = `http://localhost/MEP/user/Controller/ViewDetailsClassController.php`;
const urlstudentalsoenrolled = `http://localhost/MEP/user/Controller/ViewStudentsAlsoEnrolledController.php`;

const baseurl = "http://localhost/MEP/Institute/storages/uploads/";
const baseurlins = "http://localhost/MEP/storages/uploads/";

function addThousandSeparator(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function truncateText(text, wordLimit) {
    const words = text.split(' ');
    if (words.length > wordLimit) {
        return words.slice(0, wordLimit).join(' ') + ` ... <a href="#long-description" class="show-moreless-text text-blue-500 hover:text-blue-700">Show more</a>`;
    }
    return text;
}

$(document).ready(function () {

    const morelesscontainer = $('.more-less-containers');
    $('#more-less-ctrl').on('click', () => {
        if (morelesscontainer.hasClass('h-[190vh]')) {
            // Currently expanded
            $('.show-moreless-text').text("Show less");
            $('.show-icons').attr("name", "chevron-up-outline");
        } else {
            // Currently collapsed
            $('.show-moreless-text').text("Show more");
            $('.show-icons').attr("name", "chevron-down-outline");
        }
        morelesscontainer.toggleClass('md:h-[67vh] h-[190vh]');
    });

    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }
    // Usage
    const classId = getQueryParam('classid');

    function fetchData() {
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {
                classid: classId
            },
            success: function (response) {
                datas = response[0];
                // console.log(datas);
                const detailsinfo = `
                    <nav class="flex py-3 text-blue-500 md:mb-5 mb-3 md:px-0 px-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="./class.php" class="inline-flex items-center md:text-base text-sm font-medium text-gray-400 hover:text-blue-600 ">
                                    <svg class="w-5 h-5 me-2.5 pb-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    Class
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <a href="javascript:void(0)" class="ms-1 md:text-base text-sm font-medium text-blue-600 md:ms-2">Details</a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-10 md:px-0 px-5">

                        <div class="w-full bg-gray-100 rounded-lg md:mb-0 mb-10">
                            <div>
                                <img src="${baseurl}${datas.c_photo}" class="rounded-t-lg w-full" alt="">
                            </div>
                            <div class="grid grid-cols-2 gap-10 md:py-5 py-4">
                                <div class="flex flex-col items-end md:pr-5 pr-6">
                                    <p class="md:text-2xl text-xl font-semibold text-gray-900">${addThousandSeparator(datas.c_fee)} MMK</p>
                                    <div class="md:mt-2 text-gray-600">
                                        <svg class="inline font-bold md:w-6 md:h-6 w-5 h-5 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                                            <g fill="currentColor">
                                                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z" />
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                            </g>
                                        </svg>
                                        <span class="inline font-bold md:text-xl text-base relative md:top-0 top-0.5">${datas.credit_point}</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center md:pr-5 pr-7">
                                    <a href="http://localhost/MEP/user/Controller/CheckEnrollClassInfoController.php?classid=${datas.id}">
                                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-lg md:px-10 px-7 md:py-3 py-2.5">
                                            Enroll Now
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-white col-span-2">
                            <div class="flex flex-col items-start">
                                <h1 class="md:text-3xl text-xl font-semibold md:mb-3 mb-2">${datas.c_title}</h1>
                                <p class="md:text-base md:mb-5 mb-3 text-gray-300">
                                    ${truncateText(datas.c_des.trim(), 100)}
                                </p>
                                <div class="md:mb-5 mb-2">
                                    <div class="md:mb-1">
                                        <small class="md:text-base text-base">Institute - </small> <a href="#institute-info"><small class="underline text-base text-blue-500">${datas.institute_name}</small></a>
                                    </div>
                                </div>
                                <div class="md:mb-5 mb-4 flex flex-col space-y-2">
                                    <div>
                                        <small class="text-base">Instructor - </small> <a href="#instructor-info"><small class="underline text-base text-blue-500">${datas.instructor_name}</small></a>
                                    </div>
                                    <div>
                                        <span>Start Date - </span> <span>${datas.start_date}</span>
                                    </div>
                                    <div>
                                        <span>End Date - </span> <span>${datas.end_date}</span>
                                    </div>
                                </div>
                                <div class="md:mb-10 mb-7">
                                    <span class="text-blue-500">Enrollment Deadline - </span> <span>${datas.enrollment_deadline}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                const longdesc = `
                    <h1 class="md:text-3xl font-semibold md:mb-5 mb-3">Description</h1>
                    <p class="text-justify">${datas.c_des}</p>
                `;
                const instituteinfos = `
                    <h1 class="md:text-2xl text-xl font-semibold md:mb-5 mb-3">Institute Information</h1>
                    <div class="flex flex-wrap md:w-1/4 w-full">
                        <img src="${baseurl}${datas.i_photo}" class="md:mr-10 md:mb-5 mb-5 rounded-xl" alt="institute info">
                    </div>
                    <div class="md:mt-8 mt-5 md:mb-2 mb-10">
                        <div>
                            <h3 class="md:text-xl text-lg font-semibold md:mb-4 mb-3">${datas.institute_name}</h3>
                            <div>
                                <ion-icon name="mail-outline" class="md:text-2xl text-xl relative md:top-2 top-1.5 md:mr-2 mr-2"></ion-icon>
                                <span class="text-blue-700 text-base">${datas.i_email}</span>
                            </div>
                            <div>
                                <ion-icon name="call-outline" class="md:text-2xl text-xl relative md:top-2 top-1 md:mr-2 mr-2"></ion-icon>
                                <span class="text-base"></span><span>${datas.i_phone}</span>
                            </div>
                            <div>
                                <ion-icon name="location-outline" class="md:text-2xl text-xl relative md:top-1 top-1.5 md:mr-2 mr-2"></ion-icon>
                                <span class="text-gray-600">${datas.i_address}</span>
                            </div>
                        </div>
                    </div>
                `;
                const instructorinfos = `
                    <h1 class="md:text-2xl text-xl font-semibold md:mb-10 mb-5">Instructor Information</h1>
                    <div class="md:flex md:flex-row flex-col">
                        <div class="md:mr-16 mr-14 md:mb-5 mb-6 md:w-1/4 w-full">
                            <img src="${baseurl}${datas.instructor_photo}" class="md:mr-16 mr-14 md:mb-5 mb-6 rounded-xl" alt="${datas.instructor_photo}">
                            <h3 class="text-blue-700 underline">${datas.instructor_name}</h3>
                            <p class="text-gray-500">${datas.instructor_position}</p>
                        </div>
                        <div class="md:mt-8 mt-5">
                            <div>
                                <ion-icon name="mail-outline" class="md:text-2xl text-xl relative md:top-2 top-1.5 md:mr-2 mr-2"></ion-icon>
                                <span class="text-blue-700 text-base">${datas.instructor_email}</span>
                            </div>
                            <div>
                                <ion-icon name="call-outline" class="md:text-2xl text-xl relative md:top-2 top-1 md:mr-2 mr-2"></ion-icon>
                                <span class="text-base"></span><span>${datas.instructor_phone}</span>
                            </div>
                            <div>
                                <ion-icon name="location-outline" class="md:text-2xl text-xl relative md:top-1 top-1.5 md:mr-2 mr-2"></ion-icon>
                                <span class="text-gray-600">${datas.instructor_address}</span>
                            </div>
                            <div>
                                <ion-icon name="ribbon-outline" class="md:text-2xl text-xl relative md:top-1 top-1.5 md:mr-2 mr-2"></ion-icon>
                                <span class="text-gray-600">${datas.instructor_skills}</span>
                            </div>
                        </div>
                    </div>
                    <div class="md:mt-8 mt-5">
                        <div>
                            <h3 class="text-lg font-semibold md:mb-4 mb-3">Biography</h3>
                            <p>${datas.instructor_bio}</p>
                        </div>
                        <div class="md:my-10 my-5">
                            <h3 class="text-lg font-semibold md:mb-4 mb-3">Education</h3>
                            <p>${datas.instructor_edu}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold md:mb-4 mb-3">Experience</h3>
                            <p>${datas.instructor_exp}</p>
                        </div>
                    </div>
                `;
                $('#details-info').html(detailsinfo);
                $('#long-description').html(longdesc);
                generateCards().then(classdatas => {
                    $('#card-container').html(classdatas);
                });
                $('#institute-info').html(instituteinfos);
                $('#instructor-info').html(instructorinfos);

            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }

    fetchData();

    function generateCards() {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: urlstudentalsoenrolled,
                type: "GET",
                dataType: "json",
                success: function (datas) {
                    const carddatas = datas.map(
                        (classes) =>
                            `<div class="border-b-2 md:pb-4 md:mt-4 mt-5 cursor-pointer" onclick="window.location.href='viewdetailsclass.php?classid=${classes.id}'">
                                <div class="flex flex-col md:grid md:grid-cols-8">
                                    <div class="md:col-span-1 md:block inline">
                                        <img src="${baseurl}${classes.c_photo}" class="md:w-[300px] w-[150px] rounded-lg" alt="${classes.c_photo}">
                                    </div>
                                    <div class="md:col-span-4 flex flex-col gap-1.5 md:ml-5">
                                        <h3 class="md:text-xl text-base font-semibold md:mt-0 md:mb-0 mt-5 mb-3">${classes.c_title}</h3>
                                        <div>
                                            <small class="text-base opacity-65">Instructor - </small> <small class="underline md:text-base text-sm text-blue-500">${classes.instructor_name}</small>
                                        </div>
                                        <div>
                                            <p>
                                                <span class="opacity-65">Start Date - </span> <span class="md:mr-5 font-medium ">${classes.start_date}</span>
                                            </p>
                                            <p>
                                                <span class="opacity-65 ">End Date - </span> <span class="font-medium">${classes.end_date}</span>
                                            </p>
                                        </div>
                                        <div>
                                            <span class="text-red-500">Enrollment Deadline - </span> <span class="md:mr-5 font-medium">${classes.enrollment_deadline}</span>
                                        </div>
                                    </div>
                                    <div class="md:col-span-3 col-start-5 md:-mt-0 -mt-[78px]">
                                        <div class="flex flex-col items-end md:mb-0 relative md:bottom-0 bottom-10">
                                            <p class="md:text-xl text-base font-bold">${addThousandSeparator(classes.c_fee)} MMK</p>
                                            <div class="md:mt-2 text-gray-600 md:mb-1 mb-2">
                                                <svg class="inline font-bold md:w-5 md:h-5 w-5 h-5 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                                                    <g fill="currentColor">
                                                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z" />
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                    </g>
                                                </svg>
                                                <span class="inline font-medium md:text-xl text-base relative md:top-0 top-0.5">${classes.credit_point}</span>
                                            </div>
                                            <button type="button" class="z-50 text-white bg-blue-700 hover:bg-blue-800 font-medium text-xl px-10 md:py-1 md:mt-1 py-2.5 border rounded"><a href="http://localhost/MEP/user/Controller/CheckEnrollClassInfoController.php?classid=${classes.id}">Enroll</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                    );
                    const classdatas = carddatas.join('');
                    resolve(classdatas);
                },
                error: function (error) {
                    reject(error);
                }
            });
        });
    }

});