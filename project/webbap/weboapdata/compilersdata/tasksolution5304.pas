program ercoder;
 var x,y,z:integer; a,b:real;
begin
 read(x,y,z);
 a:=(sqrt(abs(x-1))-sqrt(abs(y)))/(1+sqr(x)/2+sqr(y)/4);
 b:=x*(cos(z)/sin(z)+1/exp(x+3));
 writeln('a=',a:9:3,'   ','b=',b:9:3);
end.
