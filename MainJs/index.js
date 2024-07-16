const HandleCreatingAlbum = () =>{    const Title = document.getElementById('Title');    const ImageAlbum  = document.getElementById('uploadAlb_img');    const btn_create = document.getElementById('create_btn');    const Message  =   document.getElementById('success_Message');    const  ValidateImageFile  = () =>{        const MessageError = ImageAlbum.files[0]        if(!MessageError){            return 'Please Select image'        }    }    let AlbumImage     ImageAlbum.addEventListener('change',(event) =>{         AlbumImage = event.target.files[0];     })    const ValidationForm = () =>{        let IsValid = true;        if(!Title.value.trim()){            document.getElementById('useTitle').innerText = 'Please Enter your Title';            Title.classList.add('is-invalid');            IsValid = false;        }else {            Title.classList.remove('is-invalid');        }        const ProfileErr =ValidateImageFile(ImageAlbum)        if (ProfileErr) {            document.getElementById('useUpload').innerText = ProfileErr;            ImageAlbum.classList.add('is-invalid');            IsValid = false        }else {            ImageAlbum.classList.remove('is-invalid');        }        return IsValid    }    btn_create.addEventListener('click',() =>{        if(!ValidationForm()){            return        }        const DATA = new FormData();        DATA.append('Title', Title.value)        DATA.append('Image', AlbumImage)    //  Ajax Request       $.ajax({           url: '../Model/CreateAlbum.php',           type: 'post',           data: DATA,           contentType: false,           processData: false,           success: function (data,stats){               // setting the loader               btn_create.innerHTML = `                <div class="spinner-border fs-1" role="status">                 <span class="visually-hidden">Loading...</span>                 </div>               `               // checking if the deletion is success               if(data.trim() === 'Pleas Wait...'){                   Message.innerText = data                   // setting the delay for refreshing the page                   setTimeout(() =>{                       location.reload()                   },2000)               }           }       })    })}const MakingDelete = () =>{    const  ConfirmDel = document.getElementById('ConfirmDel');    document.addEventListener('click',(event) =>{        if(event.target.id ==='btn_del'){           $('#ConfirmModal').modal('show')            ConfirmDel.addEventListener('click',() =>{                if(event.target.value !== undefined){ // checking if the id is not undefined to fix the bugs                    // ajax request                    $.ajax({                        url: '../Model/DeleteAlbum.php',                        type: 'post',                        data: {Id: event.target.value},                        success: function (data,status){                            document.getElementById('message').innerHTML = data                            // loading state                            ConfirmDel.innerHTML = `                            <div class="spinner-border fs-1" role="status">                                   <span class="visually-hidden">Loading...</span>                               </div>                            `                            // check if success                            if(data.trim() === 'Please Wait..'){                                setTimeout(() =>{                                    location.reload()                                },2000)                            }                        }                    })                }            })        }    })}const UpdateViewAlbum = () =>{    document.addEventListener('click',(event) =>{        if (event.target.id === 'Edit_btn'){            $.ajax({                url: "../Model/ViewUpdate.php",                type: 'post',                data:{Id: event.target.value},                success: function (data,status){                  document.getElementById('data_con').innerHTML = data                    $('#VIEW_EDIT_MODAL').modal('show')                }            })        }    })}const SaveAlbum = () => {    let ImageUp;    document.addEventListener('click', (id) => {        const TitleSave = document.getElementById('TitleSave');        const uploadAlb_imgSAVE = document.getElementById('uploadAlb_imgSAVE');        if (uploadAlb_imgSAVE !== null) {            uploadAlb_imgSAVE.addEventListener('change', (event) => {                ImageUp = event.target.files[0];            });        }        const ValidateInput = () => {            let Is_Valid = true;            if (!TitleSave.value.trim()) {                document.getElementById('TitleSaveUSE').innerText = 'Please Enter Title';                TitleSave.classList.add('is-invalid');                Is_Valid = false;            } else {                TitleSave.classList.remove('is-invalid');            }            return Is_Valid;        };        if (id.target.id === 'SaveBTN') {            if (!ValidateInput()) {                return;            }            // GET THE DATA            const DataForm = new FormData();            DataForm.append('Title', TitleSave.value);            DataForm.append('Image', ImageUp);            DataForm.append('Id', id.target.value);            console.log(ImageUp)            $.ajax({                url: "../Model/SaveUpdatedAlbum.php",                type: 'post',                data: DataForm,                processData: false,                contentType: false,                success: function (data, status) {                    document.getElementById('UPMessage').innerText = data                    document.getElementById('SaveBTN').innerHTML = `                         <div class="spinner-border fs-1" role="status">                                   <span class="visually-hidden">Loading...</span>                               </div>                        `;                    if(data.trim() === 'Please Wait...'){                       // making the delay of the reload the page                       //  wait 2 second before reloading the page                        setTimeout(() =>{                            location.reload()                        },2000)                    }                }            });        }    });};const OpenAlbum = () =>{    document.addEventListener('click',(Id) =>{        if(Id.target.id === 'open_'){            $.ajax({                url: '../Model/OpenAlbumPassId.php',                type: 'post',                data:{ID: Id.target.value},                success: function (data,status){                    document.getElementById('data_con').innerHTML = data                    setTimeout(() =>{                        location.href = '../View/OpenAlbum.php'                    },1000)                }            })        }    })}const  GettingLogout = ()=>{    const GettingLogout = document.getElementById('GettingLogout');    GettingLogout.addEventListener('click',() =>{         GettingLogout.innerHTML = `      <div class="spinner-border fs-1" role="status">         <span class="visually-hidden">Loading...</span>           </div>         `;        setTimeout(() =>{            location.href = '../Auth/Logout.php'        },2000)    })}// calling the functionGettingLogout()OpenAlbum()SaveAlbum();UpdateViewAlbum()MakingDelete()HandleCreatingAlbum()