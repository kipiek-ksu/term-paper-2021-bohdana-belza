Program pr;
var
   v,s,t:real;
Function F(v,s:real):real;
var
   t:real;
Begin
   t:=s/v;
   F:=t;
end;
Begin
   read(v,s);
   t:=F(v,s);
   write(t:4:2);
end.