program ercoder;
 var x,y,z:integer; a,b:real;
begin
 read(x,y,z);
 a:=(1+sqr(sin(x+y)))/(2+abs(x-2*x)*abs(1+sqr(x)*sqr(y)))+x;
 b:=sqr(cos(cos(1/z)/sin(1/z)));
 writeln('a=',a:9:3,'   ','b=',b:9:3);
end.
