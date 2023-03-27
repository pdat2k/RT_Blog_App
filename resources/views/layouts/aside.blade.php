<aside class="aside">
    <div class="content">
        <div class="aside-breadcrumb">
            Home > <span class="aside-breadcrumb-title">Create Blog</span>
        </div>
        <div class="aside-container">
            <h3 class="aside-title ">Create Blog</h3>
            <form action="" class="aside-form">
                <div class="aside-form-group">
                    <label l el for="" class="aside-label"></label>
                </div>
                <div class="aside-form-group">
                    <label for="" class="aside-label">Category
                        <span class="aside-label-start">*</span>
                    </label>
                    <select class="form-select aside-form-category" aria-label="Default select example" name='category'>
                        <option selected>Select category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="aside-form-group">
                    <label for="title" class="aside-label">Title
                        <span class="aside-label-start">*</span>
                    </label>
                    <input type="text" class="form-control aside-form-title" id="title" placeholder="Title"
                        name='title' />
                </div>
                <div class="aside-form-group">
                    <p class="aside-label-upload">Upload image</p>
                    <label for="file" class="aside-form-fileImage">Upload Image</label>
                    <input type="file" class="form-control aside-form-file" id="file" name='image' />
                    <img src="{{asset('images/default-image.jpg')}}" alt="" class="aside-form-image" />
                </div>
                <div class="aside-form-group">
                    <label for="description" class="aside-label">Description
                        <span class="aside-label-start">*</span>
                    </label>
                    <textarea class="form-control aside-form-description" id="description" rows="3" name='description'></textarea>
                </div>
                <div class="aside-form-group">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</aside>
