program lr4z14;
 var a,b,c,r1,r2,r3: real;
 function SF(r: real): real;
  begin
   if r>0 then SF:=r*r else SF:=r;
  end;
 BEGIN
  read(a,b,c);
  r1:=SF(a);
  r2:=SF(b);
  r3:=SF(c);
  write(r1:7:4,' ',r2:7:4,' ',r3:7:4);
 END.