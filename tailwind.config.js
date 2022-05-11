module.exports = {
  content: ["./**/*.php","./**/*.html","./layout/**/*.js"],
  theme: {
    screens : {
      sm : '480 px' , 
      md : '768 px' ,
      lg : '976 px',
      xl : '1440 px'

    },
    extend: {
      fontFamily :
      {sans : ['Poppins','sans-serif' ,'lato']
    },
    colors :  {
      grey : {
        50: '#F9FAFB', 
        300 : '#F1F1F1', 
        400: '#E0E0E0' , 
        500 : '#AEAEAE' , 
        600 : '#7E7E7E' , 
        900 : '#303030' , 
      }
   
    }
    }
  },
  plugins: [],
}
