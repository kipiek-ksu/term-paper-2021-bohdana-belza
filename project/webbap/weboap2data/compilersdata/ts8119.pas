var a,b,x,y,z:real;
begin
     read(x,y,z);
     a:=(1+y)*(x+y/(sqr(x)+4))/(exp(-x-2)+1/(sqr(x)+4));
     b:=(1+cos(y-2))/(sqr(x)*sqr(x)/2+sqr(sin(z)));
     write(a:0:2,' ',b:0:9);
end.