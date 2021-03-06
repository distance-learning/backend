define({ "api": [
  {
    "type": "get",
    "url": "/api/account/tests",
    "title": "Get teacher tests",
    "sampleRequest": [
      {
        "url": "/api/account/tests"
      }
    ],
    "description": "<p>Get teacher tests</p> ",
    "group": "Account",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Account",
    "name": "GetApiAccountTests"
  },
  {
    "type": "post",
    "url": "/api/account/image",
    "title": "Set avatar for current user",
    "sampleRequest": [
      {
        "url": "/api/account/image"
      }
    ],
    "description": "<p>Set avatar for current user</p> ",
    "group": "Account",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Account",
    "name": "PostApiAccountImage"
  },
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
            "description": "<p>Returned if directions successful deleted</p> "
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
            "description": "<p>Returned if user has not access for delete course</p> "
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
            "description": "<p>Returned if courses issets</p> "
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
            "description": "<p>Returned if user has not access for get courses</p> "
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
    "type": "get",
    "url": "/api/admin/courses/:id",
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
            "description": "<p>Returned if course isset</p> "
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
            "description": "<p>Returned if user has not access for get course</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "GetApiAdminCoursesId"
  },
  {
    "type": "get",
    "url": "/api/admin/courses/search",
    "title": "Search courses",
    "sampleRequest": [
      {
        "url": "/api/admin/courses/search"
      }
    ],
    "description": "<p>Search courses</p> ",
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
            "field": "search",
            "description": "<p>Search param</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/CoursesController.php",
    "groupTitle": "Admin_Courses",
    "name": "GetApiAdminCoursesSearch"
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
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "is_active",
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
            "description": "<p>Returned if course successful created</p> "
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
            "description": "<p>Returned if user has not access for create course</p> "
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
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "is_active",
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
            "description": "<p>Returned if course successful updated</p> "
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
            "description": "<p>Returned if user has not access for update course</p> "
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
            "description": "<p>Returned if user has not access for delete direction</p> "
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
    "title": "Get groups by direction",
    "sampleRequest": [
      {
        "url": "/api/admin/directions/:slug/groups"
      }
    ],
    "description": "<p>Get groups by direction</p> ",
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
            "description": "<p>Returned if user has not access for get groups in directions</p> "
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
            "description": "<p>Returned if user has not access for create directions</p> "
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
            "field": "faculty_id",
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
            "description": "<p>Returned if user has not access for update direction</p> "
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
    "url": "/api/admin/faculties/search",
    "title": "Search faculties",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties/search"
      }
    ],
    "description": "<p>Search faculties</p> ",
    "group": "Admin_Faculties",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Auth token</p> "
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
            "field": "search",
            "description": "<p>Search params</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "GetApiAdminFacultiesSearch"
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
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculties.examinations",
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
    "type": "post",
    "url": "/api/admin/faculties/:slug/image",
    "title": "Set image for faculty",
    "sampleRequest": [
      {
        "url": "/api/admin/faculties/:slug/image"
      }
    ],
    "description": "<p>Set image for faculty</p> ",
    "group": "Admin_Faculties",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "count",
            "description": "<p>Count faculties by page</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/FacultiesController.php",
    "groupTitle": "Admin_Faculties",
    "name": "PostApiAdminFacultiesSlugImage"
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
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "faculty.examinations",
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
    "type": "delete",
    "url": "/api/admin/groups/:slug/students/:student_slug",
    "title": "Remove student from group",
    "sampleRequest": [
      {
        "url": "/api/admin/groups/:slug/students/:student_slug"
      }
    ],
    "description": "<p>Remove student from group</p> ",
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
    "name": "DeleteApiAdminGroupsSlugStudentsStudent_slug"
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
            "description": "<p>Returned if groups isset</p> "
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
            "description": "<p>Returned if group isset</p> "
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
            "description": "<p>Returned if students issets</p> "
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
            "description": "<p>Returned if user has not access for get students</p> "
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
            "description": "<p>Returned if students issets</p> "
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
            "description": "<p>Returned if user has not access for get students</p> "
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
    "url": "/api/admin/subjects/:id",
    "title": "Delete subject by id",
    "sampleRequest": [
      {
        "url": "/api/admin/subjects/:id"
      }
    ],
    "description": "<p>Delete subject by id</p> ",
    "group": "Admin_Subjects",
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
            "description": "<p>Returned if subject successful delete</p> "
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
            "description": "<p>Returned if user has not access for delete subject</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/SubjectsController.php",
    "groupTitle": "Admin_Subjects",
    "name": "DeleteApiAdminSubjectsId"
  },
  {
    "type": "get",
    "url": "/api/admin/subjects",
    "title": "Get paginated subjects",
    "sampleRequest": [
      {
        "url": "/api/admin/subjects"
      }
    ],
    "description": "<p>Get paginated subjects</p> ",
    "group": "Admin_Subjects",
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
            "description": "<p>Returned if subjects isset</p> "
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
            "description": "<p>Returned if user has not access for get subjects</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/SubjectsController.php",
    "groupTitle": "Admin_Subjects",
    "name": "GetApiAdminSubjects"
  },
  {
    "type": "get",
    "url": "/api/admin/subjects/:id",
    "title": "Get subject by id",
    "sampleRequest": [
      {
        "url": "/api/admin/subjects/:id"
      }
    ],
    "description": "<p>Get subject by id</p> ",
    "group": "Admin_Subjects",
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
            "description": "<p>Returned if subject isset</p> "
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
            "description": "<p>Returned if user has not access for get subject</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/SubjectsController.php",
    "groupTitle": "Admin_Subjects",
    "name": "GetApiAdminSubjectsId"
  },
  {
    "type": "get",
    "url": "/api/admin/subjects/search",
    "title": "Search subjects",
    "sampleRequest": [
      {
        "url": "/api/admin/subjects/search"
      }
    ],
    "description": "<p>Search subjects</p> ",
    "group": "Admin_Subjects",
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
            "field": "search",
            "description": "<p>Search params</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/SubjectsController.php",
    "groupTitle": "Admin_Subjects",
    "name": "GetApiAdminSubjectsSearch"
  },
  {
    "type": "post",
    "url": "/api/admin/subjects",
    "title": "Create subject",
    "sampleRequest": [
      {
        "url": "/api/admin/subjects"
      }
    ],
    "description": "<p>Create subject</p> ",
    "group": "Admin_Subjects",
    "permission": [
      {
        "name": "administrator, university_administrator"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "name",
            "description": "<p>Subject name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Subject description</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "faculty_id",
            "description": "<p>Faculty identificator</p> "
          }
        ]
      }
    },
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
            "description": "<p>Returned if subject successful created</p> "
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
            "description": "<p>Returned if user has not access for create subject</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/SubjectsController.php",
    "groupTitle": "Admin_Subjects",
    "name": "PostApiAdminSubjects"
  },
  {
    "type": "put",
    "url": "/api/admin/subjects/:id",
    "title": "Update subject action",
    "sampleRequest": [
      {
        "url": "/api/admin/subjects/:id"
      }
    ],
    "description": "<p>Update subject action</p> ",
    "group": "Admin_Subjects",
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
            "description": "<p>Subject name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Subject description</p> "
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
            "description": "<p>Returned if subject successful update</p> "
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
            "description": "<p>Returned if user has not access for update subjects</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/SubjectsController.php",
    "groupTitle": "Admin_Subjects",
    "name": "PutApiAdminSubjectsId"
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
            "description": "<p>Returned if user has not access for delete teacher</p> "
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
            "description": "<p>Returned if teachers isset</p> "
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
            "description": "<p>Returned if user has not access for delete user</p> "
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
    "url": "/api/admin/users/search",
    "title": "Search users by params",
    "sampleRequest": [
      {
        "url": "/api/admin/users/search"
      }
    ],
    "description": "<p>Search users</p> ",
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
            "field": "search",
            "description": "<p>Search params</p> "
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
            "description": "<p>Returned if user successful searched</p> "
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
            "description": "<p>Returned if user has not access for delete user</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Admin/UsersController.php",
    "groupTitle": "Admin_Users",
    "name": "GetApiAdminUsersSearch"
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
            "description": "<p>Returned if user successful created</p> "
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
            "description": "<p>Returned if user has not access for create another user</p> "
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
            "description": "<p>Returned if user successful updated</p> "
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
            "description": "<p>Returned if user has not access for update another user</p> "
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
    "type": "delete",
    "url": "/api/courses/:id",
    "title": "Delete course by id",
    "sampleRequest": [
      {
        "url": "/api/admin/courses/:id"
      }
    ],
    "description": "<p>Delete course by id</p> ",
    "group": "Courses",
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
    "filename": "app/Http/Controllers/CoursesController.php",
    "groupTitle": "Courses",
    "name": "DeleteApiCoursesId"
  },
  {
    "type": "get",
    "url": "/api/course/:id",
    "title": "Get course by id",
    "sampleRequest": [
      {
        "url": "/api/admin/course/:id"
      }
    ],
    "description": "<p>Get course by id</p> ",
    "group": "Courses",
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
    "filename": "app/Http/Controllers/CoursesController.php",
    "groupTitle": "Courses",
    "name": "GetApiCourseId"
  },
  {
    "type": "get",
    "url": "/api/courses",
    "title": "Get courses by page",
    "sampleRequest": [
      {
        "url": "/api/admin/courses"
      }
    ],
    "description": "<p>Get courses by page</p> ",
    "group": "Courses",
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
    "filename": "app/Http/Controllers/CoursesController.php",
    "groupTitle": "Courses",
    "name": "GetApiCourses"
  },
  {
    "type": "post",
    "url": "/api/courses",
    "title": "Create new course",
    "sampleRequest": [
      {
        "url": "/api/admin/courses"
      }
    ],
    "description": "<p>Create new course</p> ",
    "group": "Courses",
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
    "filename": "app/Http/Controllers/CoursesController.php",
    "groupTitle": "Courses",
    "name": "PostApiCourses"
  },
  {
    "type": "put",
    "url": "/api/courses/:id",
    "title": "Update course by id",
    "sampleRequest": [
      {
        "url": "/api/admin/courses/:id"
      }
    ],
    "description": "<p>Update course by id</p> ",
    "group": "Courses",
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
    "filename": "app/Http/Controllers/CoursesController.php",
    "groupTitle": "Courses",
    "name": "PutApiCoursesId"
  },
  {
    "type": "get",
    "url": "/api/events",
    "title": "Get events by interval",
    "sampleRequest": [
      {
        "url": "/api/events"
      }
    ],
    "description": "<p>Get events by interval</p> ",
    "group": "Events",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User auth token</p> "
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
            "field": "year",
            "description": "<p>Year</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "month",
            "description": "<p>Month</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/EventsController.php",
    "groupTitle": "Events",
    "name": "GetApiEvents"
  },
  {
    "type": "get",
    "url": "/api/events/notifications",
    "title": "Get notifications",
    "sampleRequest": [
      {
        "url": "/api/events/notifications"
      }
    ],
    "description": "<p>Get notifications</p> ",
    "group": "Events",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User auth token</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/EventsController.php",
    "groupTitle": "Events",
    "name": "GetApiEventsNotifications"
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
    "type": "delete",
    "url": "/api/files/:id",
    "title": "Delete file by id",
    "sampleRequest": [
      {
        "url": "/api/files/:id"
      }
    ],
    "description": "<p>Delete file by id</p> ",
    "group": "Files",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header</p> "
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
            "description": "<p>File deleted</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FilesController.php",
    "groupTitle": "Files",
    "name": "DeleteApiFilesId"
  },
  {
    "type": "get",
    "url": "/api/files",
    "title": "Get all files current user",
    "sampleRequest": [
      {
        "url": "/api/files"
      }
    ],
    "description": "<p>Get all files current user</p> ",
    "group": "Files",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header</p> "
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
            "description": "<p>Returned files</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FilesController.php",
    "groupTitle": "Files",
    "name": "GetApiFiles"
  },
  {
    "type": "get",
    "url": "/api/files/documents",
    "title": "Get all documents current user",
    "sampleRequest": [
      {
        "url": "/api/files/documents"
      }
    ],
    "description": "<p>Get all documents current user</p> ",
    "group": "Files",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header</p> "
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
            "description": "<p>Returned documents</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FilesController.php",
    "groupTitle": "Files",
    "name": "GetApiFilesDocuments"
  },
  {
    "type": "get",
    "url": "/api/files/:id",
    "title": "Get file by id",
    "sampleRequest": [
      {
        "url": "/api/files/:id"
      }
    ],
    "description": "<p>Get file by id</p> ",
    "group": "Files",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header</p> "
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
            "description": "<p>Returned file</p> "
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
            "field": "id",
            "description": "<p>File id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "author_id",
            "description": "<p>File author id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "filename",
            "description": "<p>File filename</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "path",
            "description": "<p>File path</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "content_type",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FilesController.php",
    "groupTitle": "Files",
    "name": "GetApiFilesId"
  },
  {
    "type": "get",
    "url": "/api/files/images",
    "title": "Get all images current user",
    "sampleRequest": [
      {
        "url": "/api/files/images"
      }
    ],
    "description": "<p>Get all images current user</p> ",
    "group": "Files",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header</p> "
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
            "description": "<p>Returned images</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FilesController.php",
    "groupTitle": "Files",
    "name": "GetApiFilesImages"
  },
  {
    "type": "post",
    "url": "/api/files",
    "title": "Upload file to server",
    "sampleRequest": [
      {
        "url": "/api/files"
      }
    ],
    "description": "<p>Upload file to server</p> ",
    "group": "Files",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header</p> "
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
            "description": "<p>Returned file</p> "
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
            "field": "id",
            "description": "<p>File id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "author_id",
            "description": "<p>File author id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "filename",
            "description": "<p>File filename</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "path",
            "description": "<p>File path</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "content_type",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FilesController.php",
    "groupTitle": "Files",
    "name": "PostApiFiles"
  },
  {
    "type": "delete",
    "url": "/api/modules/:id",
    "title": "Delete module",
    "sampleRequest": [
      {
        "url": "/api/modules/:id"
      }
    ],
    "description": "<p>Delete module</p> ",
    "group": "Modules",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ModulesController.php",
    "groupTitle": "Modules",
    "name": "DeleteApiModulesId"
  },
  {
    "type": "post",
    "url": "/api/modules",
    "title": "Create module",
    "sampleRequest": [
      {
        "url": "/api/modules"
      }
    ],
    "description": "<p>Create module</p> ",
    "group": "Modules",
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
            "description": "<p>Module name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "content",
            "description": "<p>Module content</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "module_group_id",
            "description": "<p>Group id</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ModulesController.php",
    "groupTitle": "Modules",
    "name": "PostApiModules"
  },
  {
    "type": "post",
    "url": "/api/modules/groups",
    "title": "Create module group",
    "sampleRequest": [
      {
        "url": "/api/modules/groups"
      }
    ],
    "description": "<p>Create module group</p> ",
    "group": "Modules",
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
            "description": "<p>Group name</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ModulesController.php",
    "groupTitle": "Modules",
    "name": "PostApiModulesGroups"
  },
  {
    "type": "put",
    "url": "/api/modules/groups/:id",
    "title": "Update module group",
    "sampleRequest": [
      {
        "url": "/api/modules/groups/:id"
      }
    ],
    "description": "<p>Update module group</p> ",
    "group": "Modules",
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
            "description": "<p>Group name</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ModulesController.php",
    "groupTitle": "Modules",
    "name": "PutApiModulesGroupsId"
  },
  {
    "type": "put",
    "url": "/api/modules/:id",
    "title": "Update module",
    "sampleRequest": [
      {
        "url": "/api/modules/:id"
      }
    ],
    "description": "<p>Create module</p> ",
    "group": "Modules",
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
            "description": "<p>Module name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "content",
            "description": "<p>Module content</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "module_group_id",
            "description": "<p>Group id</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ModulesController.php",
    "groupTitle": "Modules",
    "name": "PutApiModulesId"
  },
  {
    "type": "get",
    "url": "/api/tests/:test_id/scores",
    "title": "Get scores by test",
    "sampleRequest": [
      {
        "url": "/api/tests/:test_id/scores"
      }
    ],
    "description": "<p>Get scores by test</p> ",
    "group": "Score",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ScoresController.php",
    "groupTitle": "Score",
    "name": "GetApiTestsTest_idScores"
  },
  {
    "type": "get",
    "url": "/api/subjects/:subject_id/courses",
    "title": "Get courses by subject_id and teacher_id",
    "sampleRequest": [
      {
        "url": "/api/subjects/:subject_id/courses"
      }
    ],
    "description": "<p>Get courses by subject_id and teacher_id</p> ",
    "group": "Subjects",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "optional": false,
            "field": "success",
            "description": "<p>Returned courses</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/SubjectsController.php",
    "groupTitle": "Subjects",
    "name": "GetApiSubjectsSubject_idCourses"
  },
  {
    "type": "delete",
    "url": "/api/tasks/:task_id",
    "title": "Delete task",
    "sampleRequest": [
      {
        "url": "/api/tasks/:task_id"
      }
    ],
    "description": "<p>Delete task</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "DeleteApiTasksTask_id"
  },
  {
    "type": "get",
    "url": "/api/tasks/:task_id",
    "title": "Get task by id",
    "sampleRequest": [
      {
        "url": "/api/tasks/:task_id"
      }
    ],
    "description": "<p>Create new task</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "GetApiTasksTask_id"
  },
  {
    "type": "get",
    "url": "/api/tasks/:task_id/files",
    "title": "Get task files",
    "sampleRequest": [
      {
        "url": "/api/tasks/:task_id/files"
      }
    ],
    "description": "<p>Get task files</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User token</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "GetApiTasksTask_idFiles"
  },
  {
    "type": "post",
    "url": "/api/tasks",
    "title": "Create new task",
    "sampleRequest": [
      {
        "url": "/api/tasks"
      }
    ],
    "description": "<p>Create new task</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User token</p> "
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
            "description": "<p>Returned task</p> "
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
            "field": "attachment_id",
            "description": "<p>Attachment object id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "attachment_type",
            "description": "<p>Attachment object name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "student_id",
            "description": "<p>Student object id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "deadline",
            "description": "<p>Tasks deadline</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "subject_id",
            "description": "<p>Subject id</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "PostApiTasks"
  },
  {
    "type": "post",
    "url": "/api/tasks/groups",
    "title": "Create new task for group",
    "sampleRequest": [
      {
        "url": "/api/tasks/groups"
      }
    ],
    "description": "<p>Create new task for group</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User token</p> "
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
            "description": "<p>Returned task</p> "
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
            "field": "attachment_id",
            "description": "<p>Attachment object id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "attachment_type",
            "description": "<p>Attachment object name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "group_slug",
            "description": "<p>Group slug</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "deadline",
            "description": "<p>Tasks deadline</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "subject_id",
            "description": "<p>Subject id</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "PostApiTasksGroups"
  },
  {
    "type": "put",
    "url": "/api/tasks/:task_id",
    "title": "Update task",
    "sampleRequest": [
      {
        "url": "/api/tasks/:task_id"
      }
    ],
    "description": "<p>Update task</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>User token</p> "
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
            "description": "<p>Returned task</p> "
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
            "field": "student_id",
            "description": "<p>Student object id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "deadline",
            "description": "<p>Tasks deadline</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "subject_id",
            "description": "<p>Subject id</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "PutApiTasksTask_id"
  },
  {
    "type": "put",
    "url": "/api/tasks/:task_id/files/:file_id",
    "title": "Set answer to task",
    "sampleRequest": [
      {
        "url": "/api/tasks/:task_id/answers"
      }
    ],
    "description": "<p>Set answer to task</p> ",
    "group": "Tasks",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
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
            "field": "answer_id",
            "description": "<p>Answer id</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TasksController.php",
    "groupTitle": "Tasks",
    "name": "PutApiTasksTask_idFilesFile_id"
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
    "url": "/api/tests/:code",
    "title": "Delete test by id",
    "sampleRequest": [
      {
        "url": "/api/tests/:code"
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
    "name": "DeleteApiTestsCode"
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
    "url": "/api/tests/:code",
    "title": "Get test by code",
    "sampleRequest": [
      {
        "url": "/api/tests/:code"
      }
    ],
    "description": "<p>Get teacher tests by code</p> ",
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
    "name": "GetApiTestsCode"
  },
  {
    "type": "get",
    "url": "/api/tests/:code/export",
    "title": "Export test data",
    "sampleRequest": [
      {
        "url": "/api/tests/:code/export"
      }
    ],
    "description": "<p>Export test data</p> ",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTestsCodeExport"
  },
  {
    "type": "get",
    "url": "/api/tests/:code/passing",
    "title": "Get test for passing",
    "sampleRequest": [
      {
        "url": "/api/tests/:code/passing"
      }
    ],
    "description": "<p>Get test for passing</p> ",
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
            "field": "code",
            "description": "<p>Test code</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTestsCodePassing"
  },
  {
    "type": "get",
    "url": "/api/tests/:code/questions/:code",
    "title": "Get question",
    "sampleRequest": [
      {
        "url": "/api/tests/:code/questions/:code Update question"
      }
    ],
    "description": "<p>get question</p> ",
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
    "filename": "app/Http/Controllers/QuestionsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTestsCodeQuestionsCode"
  },
  {
    "type": "get",
    "url": "/api/tests/scores",
    "title": "Get users scores by test_id and interval",
    "sampleRequest": [
      {
        "url": "/api/tests/scores"
      }
    ],
    "description": "<p>Get scores</p> ",
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
            "field": "test_id",
            "description": "<p>Test id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "from_date",
            "description": "<p>From date</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "to_date",
            "description": "<p>To date</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTestsScores"
  },
  {
    "type": "get",
    "url": "/api/tests/search",
    "title": "Search tests",
    "sampleRequest": [
      {
        "url": "/api/tests/search"
      }
    ],
    "description": "<p>Search</p> ",
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
            "field": "search",
            "description": "<p>Search param</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "GetApiTestsSearch"
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
    "url": "/api/tests/:code/check",
    "title": "Check user questions in test",
    "sampleRequest": [
      {
        "url": "/api/tests/:code/check"
      }
    ],
    "description": "<p>Check user questions in test</p> ",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/TestsController.php",
    "groupTitle": "Tests",
    "name": "PostApiTestsCodeCheck"
  },
  {
    "type": "post",
    "url": "/api/tests/:code/questions",
    "title": "Create question",
    "sampleRequest": [
      {
        "url": "/api/tests/:code/questions"
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
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "score",
            "description": "<p>Question score</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "is_skip",
            "description": "<p>Question is skip</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "is_active",
            "description": "<p>Question is active</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "time",
            "description": "<p>Question time in seconds</p> "
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
    "filename": "app/Http/Controllers/QuestionsController.php",
    "groupTitle": "Tests",
    "name": "PostApiTestsCodeQuestions"
  },
  {
    "type": "put",
    "url": "/api/tests/:code",
    "title": "Update test by id",
    "sampleRequest": [
      {
        "url": "/api/tests/:code"
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
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "allow_skip",
            "description": "<p>Allow skip test</p> "
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
    "name": "PutApiTestsCode"
  },
  {
    "type": "put",
    "url": "/api/tests/:code/questions/:code",
    "title": "Update question",
    "sampleRequest": [
      {
        "url": "/api/tests/:code/questions/:code Update question"
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
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "score",
            "description": "<p>Question score</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "time",
            "description": "<p>Question time in seconds</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "is_skip",
            "description": "<p>Question is skip</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "is_active",
            "description": "<p>Question is active</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "answers",
            "description": "<p>Question Answers</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "answers.name",
            "description": "<p>Answer name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Boolean</p> ",
            "optional": false,
            "field": "answers.is_correct",
            "description": "<p>Answer correct</p> "
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
    "filename": "app/Http/Controllers/QuestionsController.php",
    "groupTitle": "Tests",
    "name": "PutApiTestsCodeQuestionsCode"
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
    "url": "/api/account/subjects/:subject_id/tasks",
    "title": "Get user tasks by subject",
    "sampleRequest": [
      {
        "url": "/api/account/subjects/:subject_id/tasks"
      }
    ],
    "description": "<p>Get user tasks by subject</p> ",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Auth user token</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users",
    "name": "GetApiAccountSubjectsSubject_idTasks"
  },
  {
    "type": "get",
    "url": "/api/account/tasks",
    "title": "Get user tasks",
    "sampleRequest": [
      {
        "url": "/api/account/tasks"
      }
    ],
    "description": "<p>Get user tasks</p> ",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users",
    "name": "GetApiAccountTasks"
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
    "type": "get",
    "url": "/api/users/:slug/tasks",
    "title": "Get user tasks by user slug",
    "sampleRequest": [
      {
        "url": "/api/users/:slug/tasks"
      }
    ],
    "description": "<p>Get user tasks by user slug</p> ",
    "group": "Users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
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
            "field": "slug",
            "description": "<p>Unique user slug</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "from_date",
            "description": "<p>Data start</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "to_date",
            "description": "<p>Data start</p> "
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "name": "GetApiUsersSlugTasks"
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
  },
  {
    "type": "get",
    "url": "/api/account/courses",
    "title": "Get student courses",
    "sampleRequest": [
      {
        "url": "/api/account/courses"
      }
    ],
    "description": "<p>Get student courses</p> ",
    "group": "Users_Student",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users_Student",
    "name": "GetApiAccountCourses"
  },
  {
    "type": "get",
    "url": "/api/account/modules",
    "title": "Get teacher modules and tests",
    "sampleRequest": [
      {
        "url": "/api/account/modules"
      }
    ],
    "description": "<p>Get teacher modules and tests</p> ",
    "group": "Users_Teacher",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users_Teacher",
    "name": "GetApiAccountModules"
  },
  {
    "type": "get",
    "url": "/api/account/subjects",
    "title": "Get teacher subjects",
    "sampleRequest": [
      {
        "url": "/api/account/subjects"
      }
    ],
    "description": "<p>Get teacher subjects</p> ",
    "group": "Users_Teacher",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/AccountController.php",
    "groupTitle": "Users_Teacher",
    "name": "GetApiAccountSubjects"
  }
] });