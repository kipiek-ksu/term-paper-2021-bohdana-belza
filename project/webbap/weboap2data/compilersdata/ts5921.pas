program lab2z6;
const Pi=3.14;
var x,y,z,a,b:real;

begin
    read(x,y,z);
    a:=(2*cos(x-Pi/6))/(1/2+sin(y)*sin(y));
    b:=(1+(z*z/)(3+z*z/5));
    write(a:3:3,' ',b:3:3);
end.