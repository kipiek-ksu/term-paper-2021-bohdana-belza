program div_mod;
var A,B,R1,R2:integer;
begin
   read(A);
   read(B);
   R1:=(A mod B);
   R2:=(A div B);
   write(R1,' ',R2);
end.
