Program pr13;
Var a, b, c: real; a1,b1, c1,R : string;
begin
read(a, b, c);
   if ((a>1) and (a<3)) then
   begin
      str(a:0:3,a1);
      R:=a1;
   end;
   if ((b>1) and (b<3)) then
      begin
      str(b:0:3,b1);
      R:=b1;
      end;
   if ((c>1) and (c<3)) then
      begin
      str(c:0:3,c1);
      R:=c1;
      end;
   if (((a>1) and (a<3)) and ((b>1) and (b<3))) then
      begin
      str(a:0:3,a1); str(b:0:3,b1);
      R:=a1+' '+b1;
      end;
   if (((a>1) and (a<3)) and ((c>1) and (c<3))) then
      begin
      str(a:0:3,a1); str(c:0:3,c1);
      R:=a1+' '+c1;
      end;
   if (((c>1) and (c<3)) and ((b>1) and (b<3))) then
      begin
      str(c:0:3,c1); str(b:0:3,b1);
      R:=c1+' '+b1;
      end;
   if (((a>1) and (a<3)) and ((b>1) and (b<3)) and ((c>1) and (c<3))) then
      begin
      str(a:0:3,a1); str(b:0:3,b1);str(c:0:3,c1);
      R:=a1+' '+b1+' '+c1;
      end;
   writeln(R);
end.