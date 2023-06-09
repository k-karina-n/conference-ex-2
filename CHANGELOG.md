# Changelog 

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

# [0.3.0] - 2023-03-28

### Added 

- Log in & log out functions for admin.
- Admin functions: add, update and delete (with flash message).
- README.md

### Fixed 

- Reorganized views with blade components. 
- Fixed modal-delete "blip".
- Fixed view display after redirection to route '/conference' (within admin functions). 
- Reorganized routes.  
- Fixed validation in admin function add (ConferenceList()->add()) to redirect back with inputs.
- Fixed validation in admin function update (ConferenceList()->update()) to display validation errors.

# [0.2.0] - 2023-03-21 

### Fixed 

- Updated table style in 'Conference List' view.  

### Added 

- Created 'Sign In', 'Sign Out' page views with success flash message. 
- Added DB seeder with admin access ['email' => 'admin@example.com', 'password' => 'adminadmin'].
- Added admin functions. 

# [0.1.1] - 2023-03-15 

### Fixed 
- Added date validation with Laravel.
- Changed PHP syntax to Blade PHP syntax in 'Congratulation' view.

# [0.1.0] - 2023-03-13

### Added 
- Basic version of the Project "Conference" has been created with the following functionality: 3-step registration with validation, and a conference list with pagination. 