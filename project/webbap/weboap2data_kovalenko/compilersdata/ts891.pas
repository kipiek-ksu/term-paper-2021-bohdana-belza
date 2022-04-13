Program pr;
var
   a,b:real;
Procedure M(var a,b:real);
Begin
   a:=sqrt(a);
   b:=sqrt(b);
   a:=a+b;
   b:=a-b;
   a:=a-b;
end;
Begin
   read(a,b);
   M(a,b);
   write(a:4:3,' ',b:4:3);
end.