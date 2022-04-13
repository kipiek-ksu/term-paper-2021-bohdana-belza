program z14;
type Matrix = array [1..30, 1..30] of integer;
 var A,B: matrix; m: word;
 procedure MInput(var A: Matrix; var m: word);
  var i,j: integer;
  begin
  readln(m);
   for i:=1 to m do
    for j:=1 to m do
      read(A[i,j]);
      readln;
  end;
  procedure SelMatrix(A: Matrix; m: word; var B: Matrix);
   var i,j,i2,j2,j3: integer;
   begin
    for i:=1 to m do
      for j:=1 to m do
      if A[i,i]>0 then
       begin
          if A[i,j]<>0 then
          if A[i,j]<0 then B[i,j]:=-1 else B[i,j]:=1
          else B[i,j]:=0;
       end
       else
       begin
         for j3:=1 to m do
         B[i,j3]:=A[i,j3];
       end;
   end;
  procedure MOutput(B: Matrix; m: word);
   var i,j: integer;
   begin
     for i:=1 to m do
      begin
      for j:=1 to m do
       begin
        write(B[i,j]);
         end;
       writeln
       end;
   end;
 BEGIN
  MInput(A,m);
  SelMatrix(A,m,B);
  MOutput(B,m);

 END.