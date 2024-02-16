<!DOCTYPE html>
<html>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Julius+Sans+One&family=Open+Sans&family=Source+Sans+Pro&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <style>
h1 { 
  font-family: 'Julius Sans One', sans-serif;
}

h2 { /* Contact, Skills, Education, About me, Work Experience */
  font-family: 'Archivo Narrow', sans-serif;
}

h3 { /* Accountant */
  font-family: 'Open Sans', sans-serif;
}

.jobPosition span, 
.projectName span {
  font-family: 'Source Sans Pro', sans-serif;
}

.upperCase {
  text-transform: uppercase; 
}

.smallText, 
.smallText span, 
.smallText p, 
.smallText a {
  font-family: 'Source Sans Pro', sans-serif;
  text-align: justify;
}

/* End Family */

/* Colors */
h1 { 
  color: #111; 
}

.leftPanel, 
.leftPanel a {
  color: #bebebe;
  text-decoration: none;
}

.leftPanel h2 {
  color: white;
}

/* End Colors */

/* Sizes */
h1 { 
  font-weight: 300; 
  font-size: 1.2cm;
  transform:scale(1,1.15); 
  margin-bottom: 0.2cm;
  margin-top: 0.2cm;
  text-transform: uppercase; 
}

h2 {
  margin-top: 0.1cm;
  margin-bottom: 0.1cm;
}

.leftPanel, 
.leftPanel a {
  font-size: 0.38cm;
}

.projectName span, 
.jobPosition span {
  font-size: 0.35cm;
}

.smallText, 
.smallText span, 
.smallText p, 
.smallText a {
  font-size: 0.35cm;
}

.leftPanel .smallText, 
.leftPanel .smallText, 
.leftPanel .smallText span, 
.leftPanel .smallText p, 
.smallText a {
  font-size: 0.45cm;
}

.contactIcon {
  width: 0.5cm;
  text-align: center;
}

p {
  margin-top: 0.05cm;
  margin-bottom: 0.05cm;
}
/* End Sizes */

.bolded {
  font-weight: bold;
}

.white {
  color: white;
}
/* End Fonts */

/* Layout */
body {
  background: rgb(204,204,204); 
  width: 21cm;
  height: 29.7cm;
  margin: 0 auto;
}

/* Printing */
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
}

page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}

@page {
   size: 21cm 29.7cm;
   padding: 0;
   margin: 0mm;
   border: none;
   border-collapse: collapse;
}
/* End Printing */

.container {
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 100%;
}

.leftPanel {
  width: 27%;
  background-color: #484444;
  padding: 0.7cm;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.rightPanel {
  width: 73%;
  padding: 0.7cm;
}

.leftPanel img {
  width: 4cm;
  height: 4cm;
  margin-bottom: 0.7cm;
  border-radius: 50%;
  border: 0.15cm solid white;
  object-fit: cover;
  object-position: 50% 50%;
}

.leftPanel .details {
  width: 100%;
  display: flex;
  flex-direction: column;
}

.skill {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.bottomLineSeparator {
  border-bottom: 0.05cm solid white;
}

.yearsOfExperience {
  width: 1.6cm;
  display: flex;
  flex-direction: row;
  justify-content: center;
}

.alignleft {
  text-align: left !important;
  width: 1cm;
}

.alignright {
  text-align: right !important;
  width: 0.6cm;
  margin-right: 0.1cm
}

.workExperience>ul {
  list-style-type: none;
  padding-left: 0;
}

.workExperience>ul>li {
  position: relative;
  margin: 0;
  padding-bottom: 0.5cm;
  padding-left: 0.5cm;
}

.workExperience>ul>li:before {
  background-color: #b8abab;
  width: 0.05cm;
  content: '';
  position: absolute;
  top: 0.1cm;
  bottom: -0.2cm; /* change this after border removal */
  left: 0.05cm;
}

.workExperience>ul>li::after {
  content: '';
  position: absolute;
  /* background-image: url("/public/storage/pfp/ArQYGwY9vbs6RjvL1ljsrfGyPoSNsHVfP3fteRXT.png"); */
  background-repeat: no-repeat;
  background-size: contain;
  left: -0.09cm;
  top: 0;
  width: 0.35cm;
  height: 0.35cm;
}

.jobPosition {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.item {
  padding-bottom: 0.7cm;
  padding-top: 0.7cm;
}

.item h2{
  margin-top: 0;
}

.lastParagrafNoMarginBottom {
  margin-bottom: 0;
}

.workExperience>ul>li ul {
  padding-left: 0.5cm;
  list-style-type: disc;
}
/*End Layout*/

    </style>
  <page size="A4">
    <div class="container">
      <div class="leftPanel">
        <img src=""/>
        <div class="details">
          <div class="item bottomLineSeparator">
            <h2>
              CONTACT
            </h2>
            <div class="smallText">
              <p>
                <i class="fa fa-phone contactIcon" aria-hidden="true"></i>
                {{ $user->profile->contact_information }}
              </p>
              <p>
                <i class="fa fa-envelope contactIcon" aria-hidden="true"></i>
                <a href="mailto:lorem@ipsum.com@gmail.com">
                    {{ $user->email }}
                </a>
              </p>
              <p>
                <i class="fa fa-map-marker contactIcon" aria-hidden="true"></i>
                {{ $user->profile->address }}
              </p>
            </div>
          </div>
          <div class="item bottomLineSeparator">
            <h2>
              SKILLS
            </h2>
            <div class="smallText">
            @foreach($user->skills as $competence)
                <div class="skill">
                    <span>{{ $competence->name }}</span>
                </div>
            @endforeach
            </div>
          </div>
          <div class="item">
            <h2>
              EDUCATION
            </h2>
            <div class="smallText">
            @foreach($user->education as $education)
                <div class="skill">
                    <div>
                        <span>{{ $education->degree }}</span> <!-- Replace 'name' with the actual attribute containing the skill name -->
                        <span>{{ $education->institution }}</span>
                        <span>{{ $education->field_of_study }}</span>
                    </div>
                </div>
            @endforeach
            </div>
          </div>
          <div class="item">
            <h2>
              LANGUAGES
            </h2>
            <div class="smallText">
            @foreach($user->languages as $language)
                <div class="skill">
                    <div>
                        <span>{{ $language->language }}</span> <!-- Replace 'name' with the actual attribute containing the skill name -->
                        <span>{{ $language->proficiency }}</span>
                    </div>
                </div>
            @endforeach
            </div>
          </div>
        </div>
        
      </div>
      <div class="rightPanel">
        <div>
          <h1>
            {{ $user->name }}
          </h1>
          <div class="smallText">
            <h3>
              {{ $user->title }}
            </h3>
          </div>
        </div>
        <div>
          <h2>
            About me
          </h2>
          <div class="smallText">
            <p>
              {{ $user->profile->about_me }}
            </p>
          </div>
        </div>
        <div class="workExperience">
          <h2>
            Work experience
          </h2>
          <ul>

            @foreach($user->experiences as $experience)
            <li>
              <div class="smallText">
                <p>
                    {{ $experience->title }}

                </p>
                <p>
                    {{ $experience->company }}   
                </p>
                <p>
                    {{ $experience->description }} 
                </p>
              </div>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </page>
</body>
</html>
