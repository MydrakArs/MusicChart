<template>
<div class="uploader" @dragenter="OnDragEnter" @dragleave="OnDragLeave" @dragover.prevent @drop="onDrop" :class="{ dragging: isDragging }">
    <div class="upload-control" v-show="images.length">
        <label for="file">Выберите файл</label>
        <!-- <button @click="upload">Загрузить</button> -->
    </div>
    <div v-show="!images.length">
        <p>Перетащите ваше аудиозапись</p>
        <div>или</div>
        <div class="file-input">
            <label for="file">Выберите файл</label>
            <input type="file" name="album_image[]" id="file" multiple @change="onInputChange" accept="audio/*">
        </div>
    </div>
    <div class="images-preview" v-show="images.length">
        <div class="image-wrapper" v-for="(image, index) in images" :key="index">
            <img :src="image" alt="`Image Uploader ${index}`">
            <div class="details">
                <span class="name" v-text="files[index].name"></span>
                <span class="size" v-text="getFileSize(files[index].size)"></span>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data: () => ({
        isDragging: false,
        dragCount: 0,
        files: [],
        images: []
    }),
    methods: {
        OnDragEnter(e) {
            e.preventDefault();

            this.isDragging = true;
        },
        OnDragLeave(e) {
            e.preventDefault();
            this.dragCount--;

            if (this.dragCount <= 0)
                this.isDragging = false;
        },
        onInputChange(e) {
            const files = e.target.files;

            Array.from(files).forEach(file => this.addImage(file));
        },
        onDrop(e) {
            e.preventDefault();
            e.stopPropagation();

            this.isDragging = false;

            const files = e.dataTransfer.files;

            Array.from(files).forEach(file => this.addImage(file));
        },
        addImage(file) {
            // if (!file.type.match('image.*')) {
            //     this.$toastr.e(`${file.name} is not a image`);
            //     return;
            // }

            this.files.push(file);

            const img = new Image(),
                reader = new FileReader();

            reader.onload = (e) => this.images.push(e.target.result);

            reader.readAsDataURL(file);
        },
        getFileSize(size) {
            const fSExt = ['Bytes', 'KB', 'MB', 'GB'];
            let i = 0;

            while (size > 900) {
                size /= 1024;
                i++;
            }
            return `${(Math.round(size * 100) / 100)} ${fSExt[i]}`;
        },
        upload() {
            const formData = new FormData();

            this.files.forEach(file => {
                formData.append('images[]', file, file.name);
            });

            axios.post('/images-upload', formData)
                .then(response => {
                    this.$toastr.s('Все отправлено успешно!')
                    this.images = [];
                    this.files = [];
                })
        }
    }
};
</script>

<style lang="less" scoped>
@line: #00D4FF;


.uploader {
    margin-left: 70px;
    padding: 40px 15px;
    text-align: center;
    position: relative;
    padding: 40px 15px;
    font-size: 22px;
    border: 3px dashed white;
    max-width: 800px;

    &.dragging {
        background: white;
        color: #2196f3;
        border: 3px dashed #2196f3;

        .file-input label {
            background: #2196f3;
            color: white;
        }

    }

    .file-input {
        width: 200px;
        margin: auto;
        height: 68px;
        position: relative;

        label,
        input {
            background: white;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px;
            border-radius: 4px;
            margin-top: 7px;
            cursor: pointer;
        }

        input {
            opacity: 0;
            z-index: -2;
        }
    }

    .images-preview {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;

        .image-wrapper {
            width: 160px;
            display: flex;
            flex-direction: column;
            margin: 10px;
            height: 150px;
            justify-content: space-between;
            background: white;
            box-shadow: 5px 5px 20px black;

            img {
                max-height: 105px;

            }
        }

        .details {
            font-size: 12px;
            background: #fff;
            color: black;
            display: flex;
            flex-direction: column;
            align-items: self-start;
            padding: 3px 6px;

            .name {
                overflow: hidden;
                height: 18px;
            }
        }
    }

    .upload-control {
        position: absolute;
        width: 100%;
        background: white;
        top: 0;
        left: 0;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        padding: 10px;
        padding-bottom: 4px;
        text-align: right;

        button,
        label {
            background: #2196f3;
            border: 2px solid #2196f3;
            border-radius: 3px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        label {
            padding: 2px 5px;
            margin-right: 10px;
        }
    }

}
</style>
