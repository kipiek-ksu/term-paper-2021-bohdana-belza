program RectExistsPoint;
 var b: boolean;
procedure REP1(var Mx,My,R,Cx,Cy: real);
  begin
   if (Cx>Mx+R) or (Cx<Mx-R) or ((Cy>My+R) or (Cy<My-R)) then
   b:= FALSE else b:=TRUE;
   write(b);
  end;
 var Mx,My,R,Cx,Cy: real;
   begin
     read(Mx,My,R,Cx,Cy);
     REP1(Mx,My,R,Cx,Cy);
   read;
 end.