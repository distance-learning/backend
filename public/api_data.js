define({ "api": [
  {
    "type": "delete",
    "url": "/api/faculties/:slug",
    "title": "Delete faculty by slug",
    "sampleRequest": [
      {
        "url": "/api/faculties/:slug"
      }
    ],
    "description": "<p>Delete faculty by slug</p> ",
    "group": "Faculties",
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
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "DeleteApiFacultiesSlug"
  },
  {
    "type": "get",
    "url": "/api/faculties",
    "title": "Get faculties",
    "sampleRequest": [
      {
        "url": "/api/faculties"
      }
    ],
    "description": "<p>Get some faculties</p> ",
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
    "version": "0.0.0",
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "GetApiFaculties"
  },
  {
    "type": "get",
    "url": "/api/faculties/:slug",
    "title": "Get faculty by slug",
    "sampleRequest": [
      {
        "url": "/api/faculties/:slug"
      }
    ],
    "description": "<p>Get faculty by slug</p> ",
    "group": "Faculties",
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
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "GetApiFacultiesSlug"
  },
  {
    "type": "post",
    "url": "/api/faculties",
    "title": "Create faculties",
    "sampleRequest": [
      {
        "url": "/api/faculties"
      }
    ],
    "group": "Faculties",
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
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "PostApiFaculties"
  },
  {
    "type": "put",
    "url": "/api/faculties/:slug",
    "title": "Update faculty by slug",
    "sampleRequest": [
      {
        "url": "/api/faculties/:slug"
      }
    ],
    "description": "<p>Update faculty by slug</p> ",
    "group": "Faculties",
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
    "filename": "app/Http/Controllers/FacultiesController.php",
    "groupTitle": "Faculties",
    "name": "PutApiFacultiesSlug"
  }
] });