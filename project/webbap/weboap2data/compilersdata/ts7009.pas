
program b1;
   var A,R:integer;
   begin
   read(A)
   R:=A div 1000;
   R:=R+((A div 100) mod 10);
   R:=R+((A div 10) mod 10);
   R:=R+((A mod 100) mod 10);
   write(R);
end.