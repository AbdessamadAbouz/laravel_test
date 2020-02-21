<p>Use the commande <strong>php artisan migrate</strong> to create and generate the database tables.</p>

<h2> Create / Read / Update / Delete CRUD endpoints were created for courses and categories :</h2>

## Category

<p> The use of <strong> api/category/Add </strong> will give the possibility to insert new category to the database. </p>

<p> <strong> api/category/update/{i} </strong> gives the possibility to modify the database fields of a specific data </p>

<p> <strong> api/category/{id} </strong> shows the informations related to the cateogry_id given </p>

<p> to delete a category <strong> api/category/delete/{id} </strong> endpoint is used, if the category has an image, the data related to it will be deleted from the database, and the image will drop from the folder </p>

## Course

<p> The use of <strong> api/course/add </strong> will insert new course into the database. </p>

<p> <strong> api/course/update/{i} </strong> will update the data related to a specific course </p>

<p> <strong> api/course/{id} </strong> shows the informations related to the course_id given </p>

<p> to delete a category <strong> api/course/delete/{id} </strong> endpoint is used, if the course has an image, the data related to it will be deleted from the database, and the image will drop from the folder </p>

## Image endpoint

<p> <strong> api/imageUpload </strong> will upload the selected image into the foulder <strong>storage/app/public/images</strong> if the category or the course has no image, if the course/category selected already has image, an error message will be shown. </p>


## Paginate

<p> <strong> api/category </strong> will show the categories in group of 10 per page </p>
<p> <strong> api/course </strong> will show the courses in group of 10 per page </p>

