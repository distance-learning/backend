define({ "api": [
  {
    "type": "delete",
    "url": "/api/admin/courses/:id",
    "title": "Delete course by id",
    "sampleRequest": [
      {
        "url": "/api/admin/courses/:id"
      }
    ],
    "description": "<p>Delete course by id</p> ",
    "group": "Admin_Courses",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if directions issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "DeleteApiAdminCoursesId"
  },
  {
    "type": "get",
    "url": "/api/admin/course/:id",
    "title": "Get course by id",
    "sampleRequest": [
      {
        "url": "/api/admin/course/:id"
      }
    ],
    "description": "<p>Get course by id</p> ",
    "group": "Admin_Courses",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>Course id</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if directions issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "GetApiAdminCourseId"
  },
  {
    "type": "get",
    "url": "/api/admin/courses",
    "title": "Get courses by page",
    "sampleRequest": [
      {
        "url": "/api/admin/courses"
      }
    ],
    "description": "<p>Get courses by page</p> ",
    "group": "Admin_Courses",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if directions issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "GetApiAdminCourses"
  },
  {
    "type": "post",
    "url": "/api/admin/courses",
    "title": "Create new course",
    "sampleRequest": [
      {
        "url": "/api/admin/courses"
      }
    ],
    "description": "<p>Create new course</p> ",
    "group": "Admin_Courses",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "subject_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "teacher_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "group_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if directions issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "PostApiAdminCourses"
  },
  {
    "type": "put",
    "url": "/api/admin/courses/:id",
    "title": "Update course by id",
    "sampleRequest": [
      {
        "url": "/api/admin/courses/:id"
      }
    ],
    "description": "<p>Update course by id</p> ",
    "group": "Admin_Courses",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "subject_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "teacher_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "group_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if directions issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "PutApiAdminCoursesId"
  },
  {
    "type": "delete",
    "url": "/api/admin/directions/:slug",
    "title": "Delete direction",
    "sampleRequest": [
      {
        "url": "/api/admin/directions/:slug"
      }
    ],
    "description": "<p>Remove direction</p> ",
    "group": "Admin_Directions",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "204": [
          {
            "group": "204",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if direction successful removed</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/DirectionsController.php",
    "groupTitle": "Admin_Directions",
    "name": "DeleteApiAdminDirectionsSlug"
  },
  {
    "type": "get",
    "url": "/api/admin/directions",
    "title": "Get directions by page",
    "sampleRequest": [
      {
        "url": "/api/admin/directions"
      }
    ],
    "description": "<p>Get directions by page</p> ",
    "group": "Admin_Directions",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if directions issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/DirectionsController.php",
    "groupTitle": "Admin_Directions",
    "name": "GetApiAdminDirections"
  },
  {
    "type": "get",
    "url": "/api/admin/directions/:slug",
    "title": "Get direction by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/directions/:slug"
      }
    ],
    "description": "<p>Get direction by slug</p> ",
    "group": "Admin_Directions",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique direction slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if direction issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ],
        "404": [
          {
            "group": "404",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if direction not isset</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/DirectionsController.php",
    "groupTitle": "Admin_Directions",
    "name": "GetApiAdminDirectionsSlug"
  },
  {
    "type": "get",
    "url": "/api/admin/directions/:slug/groups",
    "title": "Get groups by directions slug",
    "sampleRequest": [
      {
        "url": "/api/admin/directions/:slug/groups"
      }
    ],
    "description": "<p>Get groups by directions slug</p> ",
    "group": "Admin_Directions",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "204": [
          {
            "group": "204",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if direction successful removed</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get directions</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/DirectionsController.php",
    "groupTitle": "Admin_Directions",
    "name": "GetApiAdminDirectionsSlugGroups"
  },
  {
    "type": "post",
    "url": "/api/admin/directions",
    "title": "Create new direction",
    "sampleRequest": [
      {
        "url": "/api/admin/directions"
      }
    ],
    "description": "<p>Create direction</p> ",
    "group": "Admin_Directions",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Direction name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Direction description</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "faculty",
            "description": "<p>Faculty id</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if direction successful created</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get facilties</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/DirectionsController.php",
    "groupTitle": "Admin_Directions",
    "name": "PostApiAdminDirections"
  },
  {
    "type": "put",
    "url": "/api/admin/directions/:slug",
    "title": "Update direction",
    "sampleRequest": [
      {
        "url": "/api/admin/directions/:slug"
      }
    ],
    "description": "<p>Update direction</p> ",
    "group": "Admin_Directions",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Direction name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Direction description</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "faculty",
            "description": "<p>Faculty id</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if direction successful updated</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get facilties</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/DirectionsController.php",
    "groupTitle": "Admin_Directions",
    "name": "PutApiAdminDirectionsSlug"
  },
  {
    "type": "delete",
    "url": "/api/admin/faculties/:slug",
    "title": "Delete faculty by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties/:slug"
      }
    ],
    "description": "<p>Delete faculty by slug</p> ",
    "group": "Admin_Faculties",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique faculty identificator</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "204": [
          {
            "group": "204",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if faculty successful delete</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for delete faculty</p> "
          }
        ],
        "404": [
          {
            "group": "404",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if faculty by slug not found</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "DeleteApiAdminFacultiesSlug"
  },
  {
    "type": "get",
    "url": "/api/admin/faculties",
    "title": "Get faculties",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties?count=:count&page=:page"
      }
    ],
    "description": "<p>Get some faculties</p> ",
    "group": "Admin_Faculties",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "count",
            "description": "<p>Count faculties by page</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Faculty page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "total",
            "description": "<p>Total faculties</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "per_page",
            "description": "<p>Count faculties per page</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "current_page",
            "description": "<p>Number of current page</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "last_page",
            "description": "<p>Number of last page</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>Next page url</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>Prev page url</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "from",
            "description": "<p>Start faculty id</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "to",
            "description": "<p>End faculty id</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Object[]</p> ",
            "optional": false,
            "field": "data",
            "description": "<p>Array of faculties</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.name",
            "description": "<p>Faculty name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.description",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.avatar",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "GetApiAdminFaculties"
  },
  {
    "type": "get",
    "url": "/api/admin/faculties/:slug",
    "title": "Get faculty by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties/:slug"
      }
    ],
    "description": "<p>Get faculty by slug</p> ",
    "group": "Admin_Faculties",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Faculty unique name</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Object</p> ",
            "optional": false,
            "field": "faculty",
            "description": "<p>Faculty object</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.name",
            "description": "<p>Faculty name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.description",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.avatar",
            "description": ""
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if faculty by slug not found</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "GetApiAdminFacultiesSlug"
  },
  {
    "type": "post",
    "url": "/api/admin/faculties",
    "title": "Create faculties",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties"
      }
    ],
    "group": "Admin_Faculties",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Faculty name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Faculty description</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Object[]</p> ",
            "optional": false,
            "field": "faculties",
            "description": "<p>Array of faculties</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculties.name",
            "description": "<p>Faculty name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculties.description",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculties.avatar",
            "description": ""
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if validation error</p> "
          }
        ],
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not access for create faculty</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "PostApiAdminFaculties"
  },
  {
    "type": "put",
    "url": "/api/admin/faculties/:slug",
    "title": "Update faculty by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties/:slug"
      }
    ],
    "description": "<p>Update faculty by slug</p> ",
    "group": "Admin_Faculties",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique faculty identificator</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Faculty name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Faculty description</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Object</p> ",
            "optional": false,
            "field": "faculty",
            "description": "<p>Faculty object</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.name",
            "description": "<p>Faculty name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.description",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.avatar",
            "description": ""
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if validation error</p> "
          }
        ],
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not has access for update</p> "
          }
        ],
        "404": [
          {
            "group": "404",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if faculty by slug not found</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "PutApiAdminFacultiesSlug"
  },
  {
    "type": "delete",
    "url": "/api/admin/groups/:slug",
    "title": "Delete group by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/groups/:slug"
      }
    ],
    "description": "<p>Delete group by slug</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "DeleteApiAdminGroupsSlug"
  },
  {
    "type": "delete",
    "url": "/api/admin/groups/:slug/students",
    "title": "Remove students from group",
    "sampleRequest": [
      {
        "url": "/api/admin/groups/:slug/students"
      }
    ],
    "description": "<p>Remove students from group</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "DeleteApiAdminGroupsSlugStudents"
  },
  {
    "type": "get",
    "url": "/api/admin/groups",
    "title": "Get groups by page",
    "sampleRequest": [
      {
        "url": "/api/admin/groups"
      }
    ],
    "description": "<p>Get groups by page</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if groups issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "GetApiAdminGroups"
  },
  {
    "type": "get",
    "url": "/api/admin/groups/:slug",
    "title": "Get group by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/groups/:slug"
      }
    ],
    "description": "<p>Get group by slug</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if group issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get groups</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "GetApiAdminGroupsSlug"
  },
  {
    "type": "post",
    "url": "/api/admin/groups",
    "title": "Create new group",
    "sampleRequest": [
      {
        "url": "/api/admin/groups"
      }
    ],
    "description": "<p>Create new group</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "direction_id",
            "description": "<p>Direction id</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if group issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "PostApiAdminGroups"
  },
  {
    "type": "post",
    "url": "/api/admin/groups/:slug/students",
    "title": "Add students to group",
    "sampleRequest": [
      {
        "url": "/api/admin/groups/:slug/students"
      }
    ],
    "description": "<p>Add students to group</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "PostApiAdminGroupsSlugStudents"
  },
  {
    "type": "put",
    "url": "/api/admin/groups/:slug",
    "title": "Update group by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/groups/:slug"
      }
    ],
    "description": "<p>Update group by slug</p> ",
    "group": "Admin_Groups",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Slug</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "direction_id",
            "description": "<p>Direction id</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/GroupsController.php",
    "groupTitle": "Admin_Groups",
    "name": "PutApiAdminGroupsSlug"
  },
  {
    "type": "get",
    "url": "/api/admin/students",
    "title": "Get students by page",
    "sampleRequest": [
      {
        "url": "/api/admin/students"
      }
    ],
    "description": "<p>Get students by page</p> ",
    "group": "Admin_Students",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/StudentsController.php",
    "groupTitle": "Admin_Students",
    "name": "GetApiAdminStudents"
  },
  {
    "type": "get",
    "url": "/api/admin/students/search",
    "title": "Search students",
    "sampleRequest": [
      {
        "url": "/api/admin/students/search"
      }
    ],
    "description": "<p>Search students</p> ",
    "group": "Admin_Students",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "param",
            "description": "<p>Search params</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/StudentsController.php",
    "groupTitle": "Admin_Students",
    "name": "GetApiAdminStudentsSearch"
  },
  {
    "type": "delete",
    "url": "/api/admin/teachers/:slug",
    "title": "Delete teacher",
    "sampleRequest": [
      {
        "url": "/api/admin/teachers/:slug"
      }
    ],
    "description": "<p>Remove teacher</p> ",
    "group": "Admin_Teachers",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "204": [
          {
            "group": "204",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teacher successful removed</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teacher</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/TeachersController.php",
    "groupTitle": "Admin_Teachers",
    "name": "DeleteApiAdminTeachersSlug"
  },
  {
    "type": "get",
    "url": "/api/admin/teachers",
    "title": "Get teachers by page",
    "sampleRequest": [
      {
        "url": "/api/admin/teachers"
      }
    ],
    "description": "<p>Get teachers by page</p> ",
    "group": "Admin_Teachers",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/TeachersController.php",
    "groupTitle": "Admin_Teachers",
    "name": "GetApiAdminTeachers"
  },
  {
    "type": "get",
    "url": "/api/admin/teachers/:slug",
    "title": "Get teacher by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/teachers/:slug"
      }
    ],
    "description": "<p>Get teacher by slug</p> ",
    "group": "Admin_Teachers",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique teacher slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teacher issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get teachers</p> "
          }
        ],
        "404": [
          {
            "group": "404",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if teacher not isset</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/TeachersController.php",
    "groupTitle": "Admin_Teachers",
    "name": "GetApiAdminTeachersSlug"
  },
  {
    "type": "post",
    "url": "/api/admin/teachers",
    "title": "Create new teacher",
    "sampleRequest": [
      {
        "url": "/api/admin/teachers"
      }
    ],
    "description": "<p>Create teacher</p> ",
    "group": "Admin_Teachers",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "birthday",
            "description": "<p>User birthday</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>User description</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>User password</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teacher successful created</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for create teacher</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if throw server error</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/TeachersController.php",
    "groupTitle": "Admin_Teachers",
    "name": "PostApiAdminTeachers"
  },
  {
    "type": "put",
    "url": "/api/admin/teachers/:slug",
    "title": "Update teacher",
    "sampleRequest": [
      {
        "url": "/api/admin/teachers/:slug"
      }
    ],
    "description": "<p>Update teacher</p> ",
    "group": "Admin_Teachers",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "birthday",
            "description": "<p>User birthday</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>User description</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>User password</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teacher successful updated</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for update teacher</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if throw server error</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/TeachersController.php",
    "groupTitle": "Admin_Teachers",
    "name": "PutApiAdminTeachersSlug"
  },
  {
    "type": "delete",
    "url": "/api/admin/users/:slug",
    "title": "Delete user",
    "sampleRequest": [
      {
        "url": "/api/admin/users/:slug"
      }
    ],
    "description": "<p>Remove user</p> ",
    "group": "Admin_Users",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "fields": {
        "204": [
          {
            "group": "204",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if user successful removed</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get user</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/UsersController.php",
    "groupTitle": "Admin_Users",
    "name": "DeleteApiAdminUsersSlug"
  },
  {
    "type": "get",
    "url": "/api/admin/users",
    "title": "Get users by page",
    "sampleRequest": [
      {
        "url": "/api/admin/users"
      }
    ],
    "description": "<p>Get users by page</p> ",
    "group": "Admin_Users",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if users issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get users</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/UsersController.php",
    "groupTitle": "Admin_Users",
    "name": "GetApiAdminUsers"
  },
  {
    "type": "get",
    "url": "/api/admin/users/:slug",
    "title": "Get user by slug",
    "sampleRequest": [
      {
        "url": "/api/admin/users/:slug"
      }
    ],
    "description": "<p>Get user by slug</p> ",
    "group": "Admin_Users",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique user slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if user issets</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for get users</p> "
          }
        ],
        "404": [
          {
            "group": "404",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not isset</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/UsersController.php",
    "groupTitle": "Admin_Users",
    "name": "GetApiAdminUsersSlug"
  },
  {
    "type": "post",
    "url": "/api/admin/users",
    "title": "Create new user",
    "sampleRequest": [
      {
        "url": "/api/admin/users"
      }
    ],
    "description": "<p>Create teacher</p> ",
    "group": "Admin_Users",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "birthday",
            "description": "<p>User birthday</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "role",
            "description": "<p>User role</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>User description</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teacher successful created</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for create teacher</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if throw server error</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/UsersController.php",
    "groupTitle": "Admin_Users",
    "name": "PostApiAdminUsers"
  },
  {
    "type": "put",
    "url": "/api/admin/users/:slug",
    "title": "Update user",
    "sampleRequest": [
      {
        "url": "/api/admin/users/:slug"
      }
    ],
    "description": "<p>Update teacher</p> ",
    "group": "Admin_Users",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "birthday",
            "description": "<p>User birthday</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "role",
            "description": "<p>User role</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>User description</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>User password</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teacher successful updated</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "403": [
          {
            "group": "403",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user has not access for update teacher</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if throw server error</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/UsersController.php",
    "groupTitle": "Admin_Users",
    "name": "PutApiAdminUsersSlug"
  },
  {
    "type": "get",
    "url": "/api/faculties",
    "title": "Get paginated faculties",
    "sampleRequest": [
      {
        "url": "/api/faculties"
      }
    ],
    "description": "<p>Get paginated faculties</p> ",
    "group": "Faculties",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "count",
            "description": "<p>Count faculties by page</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Number of current page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "GetApiFaculties"
  },
  {
    "type": "get",
    "url": "/api/faculties/random",
    "title": "Get random faculties",
    "sampleRequest": [
      {
        "url": "/api/faculties/random"
      }
    ],
    "description": "<p>Get random faculties</p> ",
    "group": "Faculties",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if faculties array</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "GetApiFacultiesRandom"
  },
  {
    "type": "get",
    "url": "/api/faculties/:slug",
    "title": "Get faculty by unique slug",
    "sampleRequest": [
      {
        "url": "/api/faculties/:slug"
      }
    ],
    "description": "<p>Get faculty by unique slug</p> ",
    "group": "Faculties",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique identificator</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if faculty isset</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "GetApiFacultiesSlug"
  },
  {
    "type": "get",
    "url": "/api/teachers",
    "title": "Get teachers",
    "sampleRequest": [
      {
        "url": "/api/teachers"
      }
    ],
    "description": "<p>Get teachers</p> ",
    "group": "Teachers",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers array</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TeachersController.php",
    "groupTitle": "Teachers",
    "name": "GetApiTeachers"
  },
  {
    "type": "get",
    "url": "/api/teachers/random",
    "title": "Get random teachers",
    "sampleRequest": [
      {
        "url": "/api/teachers/random"
      }
    ],
    "description": "<p>Get random teachers</p> ",
    "group": "Teachers",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers array</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TeachersController.php",
    "groupTitle": "Teachers",
    "name": "GetApiTeachersRandom"
  },
  {
    "type": "get",
    "url": "/api/teachers/:slug",
    "title": "Get teacher by unique identificator",
    "sampleRequest": [
      {
        "url": "/api/teachers/:slug"
      }
    ],
    "description": "<p>Get teacher by unique identificator</p> ",
    "group": "Teachers",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Teacher unique identificator</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if teachers array</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TeachersController.php",
    "groupTitle": "Teachers",
    "name": "GetApiTeachersSlug"
  },
  {
    "type": "delete",
    "url": "/api/tests/{id}",
    "title": "Delete test by id",
    "sampleRequest": [
      {
        "url": "/api/tests/{id}"
      }
    ],
    "description": "<p>Delete test</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>id</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>Test id</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "DeleteApiTestsId"
  },
  {
    "type": "get",
    "url": "/api/tests",
    "title": "Get tests",
    "sampleRequest": [
      {
        "url": "/api/tests"
      }
    ],
    "description": "<p>Get teacher tests</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTests"
  },
  {
    "type": "get",
    "url": "/api/tests/{id}",
    "title": "Get test by id",
    "sampleRequest": [
      {
        "url": "/api/tests/{id}"
      }
    ],
    "description": "<p>Get teacher tests by id</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>Test id</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTestsId"
  },
  {
    "type": "post",
    "url": "/api/tests",
    "title": "Create test",
    "sampleRequest": [
      {
        "url": "/api/tests/"
      }
    ],
    "description": "<p>Create test</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "PostApiTests"
  },
  {
    "type": "post",
    "url": "/api/tests/{id}/questions",
    "title": "Create question",
    "sampleRequest": [
      {
        "url": "/api/tests/{id}/questions"
      }
    ],
    "description": "<p>Create question</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/QuestionsControler.php",
    "groupTitle": "Tests",
    "name": "PostApiTestsIdQuestions"
  },
  {
    "type": "post",
    "url": "/api/tests/{id}/questions/{question_id}",
    "title": "Update question",
    "sampleRequest": [
      {
        "url": "/api/tests/{id}/questions/{question_id} Update question"
      }
    ],
    "description": "<p>update question</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Question name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "type",
            "description": "<p>Question type</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image",
            "description": "<p>Question image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "answers",
            "description": "<p>Question Answers</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/QuestionsControler.php",
    "groupTitle": "Tests",
    "name": "PostApiTestsIdQuestionsQuestion_id"
  },
  {
    "type": "put",
    "url": "/api/tests/{id}",
    "title": "Update test by id",
    "sampleRequest": [
      {
        "url": "/api/tests/{id}"
      }
    ],
    "description": "<p>Update test</p> ",
    "group": "Tests",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>Test id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Test name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "time",
            "description": "<p>Test time</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "PutApiTestsId"
  },
  {
    "type": "get",
    "url": "/api/account",
    "title": "Get user info",
    "sampleRequest": [
      {
        "url": "/api/account"
      }
    ],
    "description": "<p>Get user info</p> ",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "error": {
      "fields": {
        "201": [
          {
            "group": "201",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if user successful create</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if data not correct</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users",
    "name": "GetApiAccount"
  },
  {
    "type": "get",
    "url": "/api/account/logout",
    "title": "Logout user",
    "sampleRequest": [
      {
        "url": "/api/account/logout"
      }
    ],
    "description": "<p>Logout user</p> ",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": ""
          }
        ]
      }
    },
    "error": {
      "fields": {
        "201": [
          {
            "group": "201",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if user successful create</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if data not correct</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users",
    "name": "GetApiAccountLogout"
  },
  {
    "type": "get",
    "url": "/api/auth/faculties",
    "title": "Get faculties",
    "sampleRequest": [
      {
        "url": "/api/auth/faculties"
      }
    ],
    "description": "<p>Send request for reset password</p> ",
    "group": "Users",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AuthController.php",
    "groupTitle": "Users",
    "name": "GetApiAuthFaculties"
  },
  {
    "type": "get",
    "url": "/api/users/",
    "title": "Get n users",
    "sampleRequest": [
      {
        "url": "/api/users?count=:count&page=:page"
      }
    ],
    "description": "<p>Get n users</p> ",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "count",
            "description": "<p>Count users on page</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "page",
            "description": "<p>Users page</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "total",
            "description": "<p>Total users</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "per_page",
            "description": "<p>Count users per page</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "current_page",
            "description": "<p>Number of current page</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "last_page",
            "description": "<p>Number of last page</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>Next page url</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>Prev page url</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "from",
            "description": "<p>Start user id</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "to",
            "description": "<p>End user id</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Object</p> ",
            "optional": false,
            "field": "data",
            "description": "<p>User object</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "data.id",
            "description": "<p>User id</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.avatar",
            "description": "<p>User avatar</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.birthday",
            "description": "<p>User birthday</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.slug",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.role",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.email",
            "description": "<p>,</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "data.status",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.deleted_at",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.created_at",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.updated_at",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "name": "GetApiUsers"
  },
  {
    "type": "get",
    "url": "/api/users/:slug",
    "title": "Get user by slug",
    "sampleRequest": [
      {
        "url": "/api/users/:slug"
      }
    ],
    "description": "<p>Get user by slug</p> ",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "slug",
            "description": "<p>Unique user slug</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Object</p> ",
            "optional": false,
            "field": "data",
            "description": "<p>User object</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "data.id",
            "description": "<p>User id</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.avatar",
            "description": "<p>User avatar</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.birthday",
            "description": "<p>User birthday</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.slug",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.role",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.email",
            "description": "<p>,</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "data.status",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.deleted_at",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.created_at",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data.updated_at",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "name": "GetApiUsersSlug"
  },
  {
    "type": "post",
    "url": "/api/auth/login",
    "title": "Authenticate user",
    "sampleRequest": [
      {
        "url": "/api/auth/login"
      }
    ],
    "description": "<p>Authenticate user</p> ",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>User password</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Object</p> ",
            "optional": false,
            "field": "user",
            "description": "<p>User object</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.surname",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.avatar",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.birthday",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.phone",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.slug",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.role",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.email",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>User authenticate token</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "400": [
          {
            "group": "400",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if credentials not correct</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if user not active</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AuthController.php",
    "groupTitle": "Users",
    "name": "PostApiAuthLogin"
  },
  {
    "type": "post",
    "url": "/api/auth/registration",
    "title": "Registration for new user",
    "sampleRequest": [
      {
        "url": "/api/auth/registration"
      }
    ],
    "description": "<p>Registration for new user</p> ",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "surname",
            "description": "<p>User surname</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "phone",
            "description": "<p>User phone number</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "birthday",
            "description": "<p>User Date of birth</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>User password</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>User password</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Object</p> ",
            "optional": false,
            "field": "user",
            "description": "<p>User object</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.name",
            "description": "<p>User name</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.surname",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.avatar",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.birthday",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.phone",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.slug",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.role",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.email",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user.faculty_id",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>User authenticate token</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "201": [
          {
            "group": "201",
            "optional": false,
            "field": "success",
            "description": "<p>Returned if user successful create</p> "
          }
        ],
        "401": [
          {
            "group": "401",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if data not correct</p> "
          }
        ],
        "500": [
          {
            "group": "500",
            "optional": false,
            "field": "error",
            "description": "<p>Returned if error on serve</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AuthController.php",
    "groupTitle": "Users",
    "name": "PostApiAuthRegistration"
  },
  {
    "type": "post",
    "url": "/api/auth/reset-password",
    "title": "Send request for reset password",
    "sampleRequest": [
      {
        "url": "/api/users/reset-password"
      }
    ],
    "description": "<p>Send request for reset password</p> ",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>User password</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>User password confirmation</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AuthController.php",
    "groupTitle": "Users",
    "name": "PostApiAuthResetPassword"
  },
  {
    "type": "post",
    "url": "/api/auth/reset-password/:token",
    "title": "Change password",
    "sampleRequest": [
      {
        "url": "/api/users/reset-password/:token"
      }
    ],
    "description": "<p>Change password</p> ",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AuthController.php",
    "groupTitle": "Users",
    "name": "PostApiAuthResetPasswordToken"
  },
  {
    "type": "put",
    "url": "/api/account/reset-password",
    "title": "Update user password",
    "sampleRequest": [
      {
        "url": "/api/account/update-password"
      }
    ],
    "description": "<p>Update user password</p> ",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "old_password",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password_confirmation",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users",
    "name": "PutApiAccountResetPassword"
  },
  {
    "type": "put",
    "url": "/api/account/update",
    "title": "Update user information",
    "sampleRequest": [
      {
        "url": "/api/account/update"
      }
    ],
    "description": "<p>Update user information</p> ",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "surname",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "birthday",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "phone",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users",
    "name": "PutApiAccountUpdate"
  }
] });