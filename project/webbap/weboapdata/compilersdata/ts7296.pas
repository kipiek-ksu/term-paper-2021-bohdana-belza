program tema2_2;
var x,y,z:integer;
a,b:real;
begin
read(x,y,z);
a:=(sqrt(abs(x-1))-sqrt(abs(y)))/(1+sqrt(y)/4);
b:=x*(arctan(z)+exp(-x-3));
write(a:3:3,' ',b:0:3);
end.