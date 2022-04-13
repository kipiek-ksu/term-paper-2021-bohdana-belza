Program z9;
Type Point = ^ Item;
 Item = Record
  Data: Integer;
   Right, Left: Point
  End;
 var First: Point;

  Procedure Build(var First: Point);
   Var p,t,m: Point;
  Begin
   New(p);
   First := p;
   Read(p^.Data);
   new(p^.Left);
   p:=p^.Left;
   t:=p;
   read(p^.data);
   new(p^.Left);
   read(p^.left^.data);
   p:=p^.Left;
   read(p^.Right^.Data);
   p:=p^.Right;
   p^.left:=t;
   read(p^.Right^.Data);
   p:=p^.Right;
   m:=p^.Right;
   read(p^.Right^.Data);
   p:=First^.Left;
   p^.Right:=m;

    End;
   Procedure Allout(First: Point);

    Var p: Point;
    Begin
      Writeln('x1,x2,x3,x4,x5,x6:');
      p := First;
      Write(p^.Data,' ');
      Write(p^.Left^.Data,' ');
      p := p^.Left;
      Write(p^.Left^.Data,' ');
      p:=p^.Right;
      write(p^.Data, ' ');
      write(p^.Right^.Data, ' ');
      p:=p^.Right;
      write(p^.Right^.Data);
      WriteLn('');
      End;

   Procedure ReadGraph(First: Point);
    Var p: Point;
    Begin
      p := First;
      write(p^.Data, ' ');
      p:=p^.Left;
      write(p^.data, ' ');
      p:=p^.Left;
      write(p^.Data, ' ');
      p:=p^.Right^.Right;
      write(p^.Data, ' ');
      p:=p^.Right;
      writeLn(p^.Data);

      p:=First;
      write(p^.Data, ' ');
      p:=p^.Left;
      write(p^.Data, ' ');
      p:=p^.Left;
      write(p^.Data, ' ');
      p:=p^.Right;
      write(p^.Data, ' ');
      p:=p^.Left;
      Write(p^.Data, ' ');
      p:=p^.Right;
      write(p^.Data);
     End;
      Begin
       Build(First);
       ReadGraph(First);
      end.